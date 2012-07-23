<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\Region;
use Spb\RealityBundle\Entity\District;

/**
 * Description of LoadRegionData
 *
 * @author Denis Olinam
 */
class LoadRegionData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $r = new Region();
        $r->setName('Петербург');
        $manager->persist($r);
        
        $d = new District(); $d->setName('Адмиралтейский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Василеостровский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Выборгский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Калининский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Кировский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Колпинский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Красногвардейский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Красносельский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Кронштадтский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Курортный'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Московский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Невский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Область'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Петроградский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Петродворцовый'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Приморский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Пушкинский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Фрунзенский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Центральный'); $d->setRegion($r); $manager->persist($d);

        $r = new Region();
        $r->setName('Лен. область');
        $manager->persist($r);

        $d = new District(); $d->setName('Бокситогорский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Волосовский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Волховский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Всеволожский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Выборгский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Гатчинский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Кингисеппский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Киришский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Кировский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Лодейнопольский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Ломоносовский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Лужский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Подпорожский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Приозерский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Сланцевский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('СПб и пригороды'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Тихвинский'); $d->setRegion($r); $manager->persist($d);
        $d = new District(); $d->setName('Тосненский'); $d->setRegion($r); $manager->persist($d);
        
        $manager->flush();
    }
}

?>
