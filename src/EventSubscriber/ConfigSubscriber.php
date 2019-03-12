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
        dsm($config->get('nom'));
    }

}
