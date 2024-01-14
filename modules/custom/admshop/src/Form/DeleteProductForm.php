<?php

namespace Drupal\admshop\Form;

use Drupal\admshop\Entity\Product;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DeleteProductForm extends FormBase{

  public function getFormId() {
    return 'admshop_delete_product_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state, $product_id = NULL)
  {
    if($product_id){

      $product = Product::load($product_id);

      if($product){

        $form['product_id'] = [
          '#type' => 'hidden',
          '#value' => $product_id,
        ];

        $form["title"] = array('#markup' => $this->t("<h3>Deseja realmente excluir o produto <em>@name</em></h3>", ['@name' => $product->get('name')->value]));

        //Adicionar os botões de ação Salvar e Cancelar
        $form['actions'] = [
          '#type' => 'actions',
        ];

        $form['actions']['delete'] = [
          '#type' => 'submit',
          '#value' => $this->t('Deletar'),
          '#button_type' => 'danger',
        ];

        $form['actions']['cancel'] = [
          '#type' => 'button',
          '#value' => $this->t('Cancelar'),
          '#attributes' => [
            'onclick' => 'window.history.back(); return false;', // Retorna para a página anterior no navegador.
          ],
        ];
      }

    }else{
      $form['error_message'] = [
        '#type' => 'markup',
        '#markup' => $this->t('Produto não encontrado.'),
      ];
    }

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $values = $form_state->getValues();

    $product_id = $values['product_id'];

    $product = Product::load($product_id);

    if($product){
      $product->delete();

      // Exibe uma mensagem de sucesso.
      \Drupal::messenger()->addMessage($this->t('Produto deletado com sucesso.'));

      // Redirecionar para a página inicial após o envio do formulário.
      $form_state->setRedirect('<front>');
    }else{
      // Exibe uma mensagem de erro.
      \Drupal::messenger()->addError($this->t('Produto não encontrado.'));
    }
  }
}
