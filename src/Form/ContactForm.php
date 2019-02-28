<?php

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class ContactForm extends FormBase
{

    public function getFormId()
    {
        return 'contact_form';
    }


    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form = [];

        $form['name'] = array(
            '#type' => 'textfield',
            '#title' => 'Nom',
            '#required' => true,
            '#wrapper_attributes' => ['class' => 'col-md-6 col-xs-12']
        );
        $form['comment'] = array(
            '#type' => 'textarea',
            '#maxlength' => 64,
            '#size' => 64,
            '#required' => true,
            '#title_display' => false,
            '#placeholder' => 'Commentaire',
            '#wrapper_attributes' => ['class' => 'col-md-3 col-xs-6'],
            '#id' => 'comment'
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => 'Envoyer le commentaire',
            '#button_type' => 'primary',
            '#id' => 'submit-btn'
        );

        return $form;
    }

    public function validateForm(array &$form, FormStateInterface $formState)
    {
        // Check if name contains 3 chars
        if (strlen($formState->getValue('name')) < 3) {
            $formState->setErrorByName('name', 'Le nom doit avoir 3 caractères minimum.');
        }
    }


    public function submitForm(array &$form, FormStateInterface $form_state)
    {

    }


}