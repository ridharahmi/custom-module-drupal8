<?php

namespace Drupal\demo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ConfigSubscriber implements EventSubscriberInterface
{

    static function getSubscribedEvents()
    {
        $events['Demo_Config_Form.save'][] = ['onConfigSave', 0];
        return $events;
    }

    public function onConfigSave($event)
    {
        $config = $event->getConfig();
        //dsm($config->get('nom'));
        if (strpos($config->get('message'), 'testconfig')) {
            drupal_set_message('This Message Concerent testconfig');
            //$config->set('nom', $config->get('nom'). ' __ in Test');
        }
    }

}
