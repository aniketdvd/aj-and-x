<?php

namespace Drupal\aj_and_x\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class AJAndX extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'AJAndX';
  }
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    $form['elementtbc'] = [
      '#title' => $this->t('Select a primary color : '),
      '#type' => 'select',
      '#options' => [
        'red' => 'red',
        'blue' => 'blue',
        'green' => 'green',
      ],
			'#required' => TRUE,
      '#ajax' => [
        'callback' => '::prompt',
        'wrapper' => 'color-wrapper',
      ],
    ];
    $form['trythis'] = [
      '#prefix' => '<div id="color-wrapper">',
      '#type' => 'label',
      '#title' => $this->t('Let\'s see which color you are going to choose...'),
      '#suffix' => '</div>',
    ];

    if (!empty($form_state->getValue('elementtbc'))) {
      $form['trythis']['#title'] = $this->t('Ayy! you chose <span style="color: @col;">@col</span>', ['@col' => $form_state->getValue('elementtbc')]);
    }
    return $form;
  }
  
  /**
   * {@inheritdoc}
   */
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

  public function prompt($form, FormStateInterface $form_state) {
    return $form['trythis'];
  }
}
