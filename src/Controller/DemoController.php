<?php



namespace Drupal\Demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class DemoController extends \Drupal\Core\Controller\ControllerBase {

    public function description()
    {

        $build =  array (
          '#type'   => '#markup',
          '#markup' =>  t('hello , this is module drupal 8')
        );
        return $build;
    }

}

