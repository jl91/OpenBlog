<?php

namespace Post\Controller;

use Application\Controller\CrudController;
use Zend\View\Model\ViewModel;

class PostController extends CrudController
{

    public function indexAction()
    {
        $em         = $this->getEm();
        $collection = $em->getRepository('Post\Model\Entity\Post')->findAll();
        return new ViewModel([
            'collection' => $collection
        ]);
    }

    public function newAction()
    {
        $form = new \Post\Form\Post();

        return new ViewModel([
            'title' => 'Adicionar',
            'subTitle' => 'novo post',
            'myForm' => $form
        ]);
    }
}