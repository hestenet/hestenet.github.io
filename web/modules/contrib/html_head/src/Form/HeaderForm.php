<?php

namespace Drupal\html_head\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provide settings page for adding HTML inside head tag.
 */
class HeaderForm extends ConfigFormBase {

  /**
   * Implements FormBuilder::getFormId.
   */
  public function getFormId() {
    return 'html_head_settings';
  }

  /**
   * Implements ConfigFormBase::getEditableConfigNames.
   */
  protected function getEditableConfigNames() {
    return ['html_head.header.settings'];
  }

  /**
   * Implements FormBuilder::buildForm.
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {
    $header_section = $this->config('html_head.header.settings')->get();
    $form['header']['html_header'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Insert the HTML here.'),
      '#default_value' => isset($header_section['html_header']) ? $header_section['html_header'] : '',
      '#rows' => 10,
    ];


    return parent::buildForm($form, $form_state);
  }

  /**
   * Implements FormBuilder::submitForm().
   *
   * Save html to Drupal's config Table.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->configFactory()
      ->getEditable('html_head.header.settings')
      ->set('html_header', $values['html_header'])
      ->save();

    \Drupal::messenger()->addMessage($this->t('Your Settings have been saved.'), 'status');
  }

}
