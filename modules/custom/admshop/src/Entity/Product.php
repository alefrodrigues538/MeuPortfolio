<?php

namespace Drupal\admshop\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityChangedTrait;

/**
 * Defines the Product entity.
 *
 * @ingroup admshop
 *
 * @ContentEntityType(
 *   id = "product",
 *   label = @Translation("Product"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\admshop\ProductListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "product",
 *   admin_permission = "administer product entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *   },
 *   links = {
 *     "canonical" = "/admshop/product/{product_id}",
 *     "add-form" = "/admshop/product/add",
 *     "edit-form" = "/admshop/product/{product_id}/edit",
 *     "delete-form" = "/admshop/product/{product_id}/delete",
 *     "collection" = "/admshop/products",
 *   },
 *   field_ui_base_route = "product.settings",
 * )
 */
class Product extends ContentEntityBase
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
    $fields['description'] = BaseFieldDefinition::create('string')
      ->setLabel(\Drupal::translation()->translate('Description'))
      ->setDescription(\Drupal::translation()->translate('The description of the product.'))
      ->setRequired(TRUE)
      ->setTranslatable(TRUE)
      ->setSettings([
        'max_length' => 2550,
      ]);

    // Add more fields as needed for your product entity.

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



  // You can add custom methods and logic for the product entity here if needed.

}
