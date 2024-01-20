<?php

namespace Drupal\admshop\Form;

use Drupal\admshop\Entity\Product;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ShowProductForm extends FormBase{
  public function getFormId() {
    return 'admshop_show_product_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state, $product_id = NULL)
  {
    if($product_id){

      $product = Product::load($product_id);

      if($product){

        $form['product_id'] = [
          '#type' => 'markup',
          '#markup' => $this->t('ID do produto: @id', ['@id' => $product_id]),
        ];

        $form['name'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Nome'),
          '#required' => true,
          '#default_value' => $product->get('name')->value
        ];


        // Adicione mais campos para exibir outras informações do produto, como preço, descrição, etc.
        // ...

        // Adicionar um botão de ação para fechar o formulário.
        $form['actions'] = [
          '#type' => 'actions',
        ];

        $form['actions']['cancel'] = [
          '#type' => 'link',
          '#title' => $this->t('Fechar'),
          '#url' => \Drupal\Core\Url::fromRoute('<front>'),
        ];

      }

    }else{
      $form['error_message'] = [
        '#type' => 'markup',
        '#markup' => $this->t('Produto não encontrado.'),
      ];
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Do nothing here. This form is only used to display product information and has no actions associated
  }
}