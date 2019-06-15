<?php

/**
 * @file
 * Contains Drupal\config_example\Form\SettingsForm.
 */

namespace Drupal\config_example\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 *
 * @package Drupal\config_example\Form
 */
class SettingsForm extends ConfigFormBase {

    /** @var string Config settings */
    const CONFIG_SETTINGS = 'config_example.settings';

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
        static::CONFIG_SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'config_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::CONFIG_SETTINGS);
    $form['field1'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First Field'),
      '#default_value' => $config->get('field1'),
      '#required' => TRUE,
    );
    $form['field2'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Second Field'),
      '#default_value' => $config->get('field2'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
      parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->config(static::CONFIG_SETTINGS)
        // set multiple configurations at once by multiple calls to set()
        ->set('field1', $form_state->getValue('field1'))
        ->set('field2', $form_state->getValue('field2'))
        ->save();

      parent::submitForm($form, $form_state);

  }

}
