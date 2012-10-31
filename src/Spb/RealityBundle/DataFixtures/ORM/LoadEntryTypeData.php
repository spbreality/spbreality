<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\EntryType;

/**
 * Description of LoadEntryTypeData
 *
 * @author Denis Olinam
 */
class LoadEntryTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $et = new EntryType(); $et->setAbbr('отд'); $et->setName('Отдельный'); $manager->persist($et);
        $et = new EntryType(); $et->setAbbr('вх/ул'); $et->setName('Вход с улицы'); $manager->persist($et);
        $et = new EntryType(); $et->setAbbr('2вх'); $et->setName('2 входа'); $manager->persist($et);
    
        $manager->flush();
    }
}

?>