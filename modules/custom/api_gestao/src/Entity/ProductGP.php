<?php

namespace Drupal\api_gestao\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines the ProductGP entity.
 *
 * @ingroup api_gestao
 *
 * @ContentEntityType(
 *   id = "product_gp",
 *   label = @Translation("Product GP"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\api_gestao\ProductListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "product_gp",
 *   admin_permission = "administer product gestao pessoal entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *   },
 *   links = {
 *     "canonical" = "/api_gestao/product/{product_id}",
 *     "add-form" = "/api_gestao/product/add",
 *     "edit-form" = "/api_gestao/product/{product_id}/edit",
 *     "delete-form" = "/api_gestao/product/{product_id}/delete",
 *     "collection" = "/api_gestao/products",
 *   },
 *   field_ui_base_route = "product_gp.settings",
 * )
 */
class ProductGP extends ContentEntityBase
{
  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {
    /**
     * obtém as definições padrão dos campos da classe pai ContentEntityBase
     * para serem usados na classe Product.
     */
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(\Drupal::translation()->translate('ID'))
      ->setDescription(\Drupal::translation()->translate('The ID of the product entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(\Drupal::translation()->translate('UUID'))
      ->setDescription(\Drupal::translation()->translate('The UUID of the product entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(\Drupal::translation()->translate('Name'))
      ->setDescription(\Drupal::translation()->translate('The name of the product.'))
      ->setRequired(TRUE)
      ->setTranslatable(TRUE)
      ->setSettings([
        'max_length' => 255,
      ]);

    $fields['price_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(\Drupal::translation()->translate('Price ID'))
      ->setDescription(\Drupal::translation()->translate('Reference to the PriceGP entity.'))
      ->setSetting('target_type', 'price_gp')
      ->setSetting('handler', 'default')
      ->setDisplayOptions('form', array(
        'type' => 'entity_reference_autocomplete',
        'weight' => -3,
        'settings' => array(
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ),
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);


    $fields['tag'] = BaseFieldDefinition::create('string')
      ->setLabel(\Drupal::translation()->translate('Tag'))
      ->setDescription(\Drupal::translation()->translate('A tag of the product.'))
      ->setRequired(TRUE)
      ->setTranslatable(TRUE)
      ->setSettings([
        'max_length' => 255,
      ]);

    // Timestamp when the product was created.
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(\Drupal::translation()->translate('Created'))
      ->setDescription(\Drupal::translation()->translate('The time that the product was created.'));

    // Timestamp when the product was last updated.
    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(\Drupal::translation()->translate('Changed'))
      ->setDescription(\Drupal::translation()->translate('The time that the product was last updated.'));

    return $fields;
  }
}
