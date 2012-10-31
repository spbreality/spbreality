<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\HouseType;

/**
 * Description of LoadHouseTypeData
 *
 * @author Denis Olinam
 */
class LoadHouseTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ht = new HouseType(); $ht->setAbbr('БР'); $ht->setName('Брус/Бревно'); $manager->persist($ht);
        $ht = new HouseType(); $ht->setAbbr('БК'); $ht->setName('Бревно/Кирпич'); $manager->persist($ht);
        $ht = new HouseType(); $ht->setAbbr('К'); $ht->setName('Кирпич'); $manager->persist($ht);
    
        $manager->flush();
    }
}

?>