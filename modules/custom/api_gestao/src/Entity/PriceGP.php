<?php

namespace Drupal\api_gestao\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityChangedTrait;

/**
 * Defines the PriceGP entity.
 *
 * @ingroup api_gestao
 *
 * @ContentEntityType(
 *   id = "price_gp",
 *   label = @Translation("Price GP"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\api_gestao\ProductListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *   },
 *   base_table = "price_gp",
 *   admin_permission = "administer price gestao pessoal entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "canonical" = "/api_gestao/price/{price_gp}",
 *     "add-form" = "/api_gestao/price/add",
 *     "edit-form" = "/api_gestao/price/{price_gp}/edit",
 *     "delete-form" = "/api_gestao/price/{price_gp}/delete",
 *     "collection" = "/api_gestao/price",
 *   },
 *   field_ui_base_route = "price_gp.settings",
 * )
 */
class PriceGP extends ContentEntityBase
{

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type)
  {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(\Drupal::translation()->translate('ID'))
      ->setDescription(\Drupal::translation()->translate('The ID of the price entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(\Drupal::translation()->translate('UUID'))
      ->setDescription(\Drupal::translation()->translate('The UUID of the price entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(\Drupal::translation()->translate('Name'))
      ->setDescription(\Drupal::translation()->translate('The name of the price.'))
      ->setRequired(TRUE)
      ->setTranslatable(TRUE)
      ->setSettings([
        'max_length' => 255,
      ]);

    $fields['price'] = BaseFieldDefinition::create('decimal')
      ->setLabel(\Drupal::translation()->translate('Price'))
      ->setDescription(\Drupal::translation()->translate('The price of the product.'))
      ->setRequired(TRUE)
      ->setTranslatable(TRUE)
      ->setDefaultValue(array('amount' => 0, 'currency_code' => 'BRL'))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['product_id'] = BaseFieldDefinition::create('string')
      ->setLabel(\Drupal::translation()->translate('Name'))
      ->setDescription(\Drupal::translation()->translate('The id of the product.'))
      ->setTranslatable(TRUE)
      ->setDefaultValue('-1')
      ->setSettings([
        'max_length' => 255,
      ]);

    return $fields;
  }
}
