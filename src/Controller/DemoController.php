<?php

/**
 * custom module drupal 8
 */

namespace Drupal\demo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;

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

        $query = \Drupal::entityQuery('webform');
        $fids = $query->execute();

        $query = \Drupal::entityQuery('node')
            ->condition('type', 'article')
            ->condition('uid', 0);
        //condition('title', 'Ibidem', 'CONTAINS') %text%
        //condition('field.value', value)
        $filter_nids = $query->execute();


        $markup = 'Node nid : ' . implode(', ', $nids);
        $markup .= '<br /> User nid : ' . implode(', ', $uids);
        $markup .= '<br /> Comment nid : ' . implode(', ', $cids);
        $markup .= '<br /> Webform nid : ' . implode(', ', $fids);
        $markup .= '<br /> Filter Blog : ' . implode(', ', $filter_nids);

        $node = Node::load(reset($filter_nids));
        $markup .= '<br /><br />';
        $markup .= '<b>Description Blog :</b> ' . $node->body->value;


        $nodes = Node::loadMultiple($filter_nids);
        $markup .= '<br />';
        foreach ($nodes as $node) {
            $markup .= '<br />';
            $markup .= '<b>Blog ['. $node->nid->value .' ] : <=======> </b> ' . $node->title->value;
        }


        //dsm($nids);
        $build = ['#markup' => $markup];
        return $build;
    }

}