<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostFixture
 *
 * @author john-vostro
 */
use Doctrine\Common\DataFixtures\FixtureInterface;

class PostFixture implements FixtureInterface
{

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $manager->persist(new \Application\Model\Entity\Post([
            'createdAt' => new \DateTime('now'),
            'updatedAt' => new \DateTime('now'),
            'title' => 'Teste asdasd',
            'content' => 'sdfsffdsfsdsdfsdfdsfd',
            'status' => 'inactive',
            'slug' => 'asdsaas'
        ]));
        $manager->flush();
    }
}