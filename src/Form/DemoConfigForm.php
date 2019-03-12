<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\demo\ContactEvent;


class DemoConfigForm extends ConfigFormBase
{

    public function getFormId()
    {
        return 'Demo_Config_Form';
    }

    /**
     * created form
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('demo.Demo_Config_Form');

        $form['nom'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Nom'),
            '#default_value' => $config->get('nom'),
        );

        $form['message'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('Message'),
            '#default_value' => $config->get('message'),
        );

        return parent::buildForm($form, $form_state);

    }


    /**
     * submit form
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {

        parent::submitForm($form, $form_state);

        $config = $this->config('demo.Demo_Config_Form');

        $config->set('nom', $form_state->getValue('nom'))
            ->set('message', $form_state->getValue('message'));


        $dispatcher = \Drupal::service('event_dispatcher');
        $event = new ContactEvent($config);
        $dispatcher->dispatch('Demo_Config_Form.save', $event);

        $data = $event->getConfig()->get();
        $config->merge($data);

        $config->save();

    }

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        //name_module.id_form
        return [
            'demo.Demo_Config_Form'
        ];
    }


}