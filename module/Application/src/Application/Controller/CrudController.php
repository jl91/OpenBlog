<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

abstract class CrudController extends AbstractActionController
{
    protected $route;
    protected $action;
    protected $id;
    protected $controller;
    protected $page;
    protected $offset = 10;
    protected $layout;
    protected $view;
    protected $form;

    public function getEm()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    function getOffset()
    {
        $this->offset = (int) $this->params()->fromRoute('offset', 10);
        return $this->offset;
    }
}