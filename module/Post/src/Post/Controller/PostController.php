<?php

namespace Post\Controller;

use Application\Controller\CrudController;
use Zend\View\Model\ViewModel;

class PostController extends CrudController
{

    public function indexAction()
    {
        
        return new ViewModel();
    }
}