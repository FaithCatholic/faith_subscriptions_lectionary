<?php

namespace Drupal\faith_subscriptions_lectionary\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\faith_subscriptions_lectionary\LectionaryInterface;

/**
 * Defines the lectionary entity class.
 *
 * @ContentEntityType(
 *   id = "lectionary",
 *   label = @Translation("Lectionary"),
 *   label_collection = @Translation("Lectionaries"),
 *   label_singular = @Translation("lectionary"),
 *   label_plural = @Translation("lectionaries"),
 *   label_count = @PluralTranslation(
 *     singular = "@count lectionaries",
 *     plural = "@count lectionaries",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\faith_subscriptions_lectionary\LectionaryListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\faith_subscriptions_lectionary\LectionaryAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\faith_subscriptions_lectionary\Form\LectionaryForm",
 *       "edit" = "Drupal\faith_subscriptions_lectionary\Form\LectionaryForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   base_table = "lectionary",
 *   admin_permission = "administer lectionary",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "collection" = "/admin/content/lectionary",
 *     "add-form" = "/lectionary/add",
 *     "canonical" = "/lectionary/{lectionary}",
 *     "edit-form" = "/lectionary/{lectionary}/edit",
 *     "delete-form" = "/lectionary/{lectionary}/delete",
 *     "auto-label" = "/admin/structure/lectionary/auto-label",
 *   },
 *   field_ui_base_route = "entity.lectionary.settings",
 * )
 */
class Lectionary extends ContentEntityBase implements LectionaryInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['label'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Label'))
      ->setRequired(TRUE)
      ->setSetting('max_length', 255)
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
        'description' => t('For internal use only.'),
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayConfigurable('view', TRUE);

    return $fields;
  }

}
