<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ApplicationTest\Controller;

/**
 * Description of PostControllerTest
 *
 * @author john-vostro
 */
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use ApplicationTest\Bootstrap;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use Application\Controller\CrudController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use PHPUnit_Framework_TestCase;

class CrudControlerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    protected $controller;
    protected $request;
    protected $response;
    protected $routeMatch;
    protected $event;

    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__.'/../../../../../config/application.config.php'
        );

        parent::setUp();

        $serviceManager   = Bootstrap::getServiceManager();
        $this->controller = new CrudController();
        $this->request    = new Request();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event      = new MvcEvent();
        $config           = $serviceManager->get('Config');
        $routerConfig     = isset($config['router']) ? $config['router'] : array();
        $router           = HttpRouter::factory($routerConfig);

        $this->event->setRouter($router);
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);

        $this->controller->setServiceLocator($serviceManager);
        $this->controller->em = $this->getMock('Doctrine\ORM\EntityManager',
            array('getRepository', 'getClassMetadata', 'persist', 'flush', 'find'),
            array(), '', false);
    }

    public function testControllerShouldHaveAndDoctrineORMEntityManagerInGetEmMethod()
    {
        $em = $this->controller->getEm();
        $this->assertInstanceOf('Doctrine\ORM\EntityManager', $em);
    }
}