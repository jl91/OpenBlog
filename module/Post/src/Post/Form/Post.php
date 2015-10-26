<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Post\Form;

/**
 * Description of Post
 *
 * @author john-vostro
 */
use Zend\Form\Form;

class Post extends Form
{

    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->setAttribute('class', 'form form-default');
        $this
//            ->add(new \Zend\Form\Element\Text('post_title',['form-element']))
            ->add(new \Zend\Form\Element\Textarea('post_content',
                ['form-element']))
            ->add(new \Zend\Form\Element\Submit('send',
                ['class' => 'btn btn-default btn-success', 'value' => 'enviar']));
    }
}