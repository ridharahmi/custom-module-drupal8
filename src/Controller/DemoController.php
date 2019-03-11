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

    public function requests()
    {
        $query = \Drupal::entityQuery('node');
        $nids = $query->execute();

        $query = \Drupal::entityQuery('user');
        $uids = $query->execute();

        $query = \Drupal::entityQuery('comment');
        $cids = $query->execute();

        $markup = 'Node nid : ' . implode(', ',$nids);
        $markup .= '<br /> User nid : ' . implode(', ',$uids);
        $markup .= '<br /> Comment nid : ' . implode(', ',$cids);
        //dsm($nids);

        $build = [
            '#markup' => $markup
        ];
        return $build;
    }

}