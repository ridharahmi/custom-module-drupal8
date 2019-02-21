<?php

namespace Drupal\demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "demo_block",
 *   admin_label = @Translation("Custom Demo Block"),
 *   category = @Translation("Demo Block"),
 * )
 */
class DemoBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        return [
            '#markup' => 'Hello '. $this->configuration['firstname'] . ' !'
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function blockForm($form, FormStateInterface $form_state)
    {

        $form['block_configuration'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Firstname'),
            '#description' => $this->t('Who do you want to say Firstname to?'),
            '#default_value' => $this->configuration['firstname']
        ];

        return $form;
    }

    public function defaultConfiguration()
    {
        return ['firstname' => 'First Name'];

    }

    public function blockSubmit($form, FormStateInterface $form_state) {
        $this->configuration['firstname'] = $form_state->getValue('block_configuration');
    }

}