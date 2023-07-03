<?php

namespace Drupal\faith_subscriptions_lectionary\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the lectionary entity edit forms.
 */
class LectionaryForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();

    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];

    switch ($result) {
      case SAVED_NEW:
        $this->messenger()->addStatus($this->t('New lectionary %label has been created.', $message_arguments));
        $this->logger('faith_subscriptions_lectionary')->notice('Created new lectionary %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The lectionary %label has been updated.', $message_arguments));
        $this->logger('faith_subscriptions_lectionary')->notice('Updated lectionary %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.lectionary.canonical', ['lectionary' => $entity->id()]);

    return $result;
  }

}