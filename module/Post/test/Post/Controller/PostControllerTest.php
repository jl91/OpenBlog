<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PostTest\Controller;

/**
 * Description of PostControllerTest
 *
 * @author john-vostro
 */
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class PostControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;

    public function setUp()
    {
        $this->setApplicationConfig(
            include __DIR__.'/../../../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/post/');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Post');
        $this->assertControllerName('Post\Controller\Post');
        $this->assertControllerClass('PostController');
        $this->assertMatchedRouteName('generic-route');
    }
}