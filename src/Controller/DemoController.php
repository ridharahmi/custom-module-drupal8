<?php

/**
 * custom module drupal 8
 */

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;

class DemoController extends ControllerBase
{

    public function content()
    {
        $build = [
            '#markup' => $this->t('Hello , this is project drupal 8')
        ];
        return $build;
    }

}