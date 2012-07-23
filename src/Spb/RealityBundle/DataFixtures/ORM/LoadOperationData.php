<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\Operation;

/**
 * Description of LoadRegionData
 *
 * @author Denis Olinam
 */
class LoadOperationData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $op = new Operation(); $op->setName('Продажа'); $op->setAbbr('П'); $manager->persist($op);
        $op = new Operation(); $op->setName('Аренда'); $op->setAbbr('А'); $manager->persist($op);
        
        $manager->flush();
    }
}

?>
