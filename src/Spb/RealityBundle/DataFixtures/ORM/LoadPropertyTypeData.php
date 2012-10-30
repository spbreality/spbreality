<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\PropertyType;

/**
 * Виды собственности на земельные участки
 *
 * @author Denis Olinam
 */
class LoadPropertyTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pt = new PropertyType(); $pt->setAbbr('ИЖС'); $pt->setName('Для индивидуального жилищного строительства'); $manager->persist($pt);
        $pt = new PropertyType(); $pt->setAbbr('САД'); $pt->setName('Садоводство'); $manager->persist($pt);
        $pt = new PropertyType(); $pt->setAbbr('СНТ'); $pt->setName('Садовое некоммерческое товарищество'); $manager->persist($pt);
        $pt = new PropertyType(); $pt->setAbbr('ЛПХ'); $pt->setName('Личное подсобное хозяйство'); $manager->persist($pt);
        $pt = new PropertyType(); $pt->setAbbr('С/Х'); $pt->setName('Сельскохозяйственного назначения'); $manager->persist($pt);
        $pt = new PropertyType(); $pt->setAbbr('ПРОМ'); $pt->setName('Промышленного назначения'); $manager->persist($pt);
 
        $manager->flush();
    }
}

?>
