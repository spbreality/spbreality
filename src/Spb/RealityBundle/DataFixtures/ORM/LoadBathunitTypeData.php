<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\BathunitType;

/**
 * Description of LoadBuildingTypeData
 *
 * @author Denis Olinam
 */
class LoadBathunitTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $but = new BathunitType(); $but->setAbbr('Р'); $but->setName('Раздельный'); $manager->persist($but);
        $but = new BathunitType(); $but->setAbbr('C'); $but->setName('Совместный'); $manager->persist($but);
        $but = new BathunitType(); $but->setAbbr('Д'); $but->setName('Душ'); $manager->persist($but);
        $but = new BathunitType(); $but->setAbbr('В/К'); $but->setName('Ванна на кухне'); $manager->persist($but);
        $but = new BathunitType(); $but->setAbbr('2'); $but->setName('2 санузла'); $manager->persist($but);
    
        $manager->flush();
    }
}

?>
