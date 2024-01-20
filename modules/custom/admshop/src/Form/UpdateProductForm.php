<?php

namespace Drupal\admshop\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\admshop\Entity\Product;

class UpdateProductForm extends FormBase{

  /**
   * Retorna o ID do form
   *
   * @return void
   */
  public function getFormId() {
    return 'adminshop_update_product_form';
  }

  /**
   * Constroi os campos do formulário
   *
   * @param array $form
   * @param FormStateInterface $form_state
   * @return void
   */
  public function buildForm(array $form, FormStateInterface $form_state, $product_id = NULL)
  {

    if($product_id){

      $product = Product::load($product_id);

      if($product){

        $form['product_id'] = [
          '#type' => 'hidden',
          '#value' => $product_id,
        ];

        $form['name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Nome'),
          '#required' => true,
          '#default_value' => $product->get('name')->value
        ];

        $form['description'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Descricao'),
          '#required' => true,
          '#default_value' => $product->get('description')->value
        ];

        //Adicionar os botões de ação Salvar e Cancelar
        $form['actions'] = [
          '#type' => 'actions',
        ];

        $form['actions']['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Salvar'),
          '#button_type' => 'primary',
        ];

        $form['actions']['cancel'] = [
          '#type' => 'button',
          '#value' => $this->t('Cancelar'),
          '#attributes' => [
            'onclick' => 'window.history.back(); return false;', // Retorna para a página anterior no navegador.
          ],
        ];
      }
    }else {
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
      //Atualiza as propriedades da entidade com base nos valores do formulario
      $product->set('name',$values['name']);
      $product->set('description',$values['description']);

      //Salva as mudanças
      $product->save();

      // Exibe uma mensagem de sucesso.
      \Drupal::messenger()->addMessage($this->t('Produto atualizado com sucesso.'));

      // Redirecionar para a página inicial após o envio do formulário.
      $form_state->setRedirect('<front>');
    }else{
      // Exibe uma mensagem de erro.
      \Drupal::messenger()->addError($this->t('Produto não encontrado.'));
    }

  }
}
