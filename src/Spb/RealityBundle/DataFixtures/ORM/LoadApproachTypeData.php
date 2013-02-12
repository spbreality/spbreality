<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\ApproachType;

/**
 * Description of LoadApproachTypeData
 *
 * @author Denis Olinam
 */
class LoadApproachTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $at = new ApproachType(); $at->setAbbr('авто'); $at->setName('Автомобильный'); $manager->persist($at);
        $at = new ApproachType(); $at->setAbbr('ж/д'); $at->setName('Железнодорожный'); $manager->persist($at);
        $at = new ApproachType(); $at->setAbbr('авто ж/д'); $at->setName('Автомобильный и железнодорожный'); $manager->persist($at);
    
        $manager->flush();
    }
}

?>