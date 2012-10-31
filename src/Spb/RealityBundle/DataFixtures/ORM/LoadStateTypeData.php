<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\StateType;

/**
 * Description of LoadStateTypeData
 *
 * @author Denis Olinam
 */
class LoadStateTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $lt = new StateType(); $lt->setAbbr('хор'); $lt->setName('Хорошее'); $manager->persist($lt);
        $lt = new StateType(); $lt->setAbbr('евро'); $lt->setName('Евро ремонт'); $manager->persist($lt);
        $lt = new StateType(); $lt->setAbbr('б/отд'); $lt->setName('Без отделки'); $manager->persist($lt);
    
        $manager->flush();
    }
}

?>