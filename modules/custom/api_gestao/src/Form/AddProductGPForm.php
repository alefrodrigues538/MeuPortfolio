<?php

namespace Drupal\api_gestao\Form;

use Drupal\api_gestao\Entity\ProductGP;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class AddProductGPForm extends FormBase
{
  /**
   * Disponibiliza o id para o formulario
   *
   * @return void
   */
  public function getFormId()
  {
    return 'api_gestao_add_product_gp_form';
  }

  /**
   * Constroi os campos do formulário
   *
   * @param array $form contem os campos que seram criados
   * @param FormStateInterface $form_state contem o estado dos campos criados
   * @return void
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nome'),
      '#required' => TRUE,
    ];

    $form['price_id'] = [
      '#type' => 'entity_autocomplete',
      '#title' => $this->t('Preço'),
      '#target_type' => 'price_gp',
    ];

    $form['tag'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tag'),
      '#required' => TRUE,
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

    return $form;
  }



  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // Processar os dados enviados do formulário, por exemplo, enviar um e-mail.
    // Em um exemplo real, você processaria os dados enviados do formulário aqui.

    $values = $form_state->getValues(); // valores digitados no formulario


    $product = ProductGP::create([
      'name' => $values['name'],
      'price_id' => $values['price_id'],
      'tag' => $values['tag']
    ]);

    $product->save();

    // Exibe uma mensagem de sucesso.
    \Drupal::messenger()->addMessage($this->t('Produto adicionado com sucesso.'));

    // Redirecionar para a página inicial após o envio do formulário.
    $form_state->setRedirect('<front>');
  }
}
