<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\BuildingStage;

/**
 * Description of LoadRegionData
 *
 * @author Denis Olinam
 */
class LoadBuildingStageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bs = new BuildingStage(); $bs->setName('Новостройка'); $bs->setAbbr('Н'); $manager->persist($bs);
        $bs = new BuildingStage(); $bs->setName('Вторичка'); $bs->setAbbr('В'); $manager->persist($bs);       
        
        $manager->flush();
    }
}

?>
