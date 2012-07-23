<?php

namespace Spb\RealityBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Spb\RealityBundle\Entity\BuildingType;

/**
 * Description of LoadBuildingTypeData
 *
 * @author Denis Olinam
 */
class LoadBuildingTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bt = new BuildingType(); $bt->setAbbr('1.090.1'); $bt->setName('1.090.1 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('121'); $bt->setName('121 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('137'); $bt->setName('137 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('504'); $bt->setName('504 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('504Д'); $bt->setName('504Д серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('600'); $bt->setName('600 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('600.11'); $bt->setName('600.11 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('601'); $bt->setName('601 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('602'); $bt->setName('602 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('606'); $bt->setName('606 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('611'); $bt->setName('611 серия'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('Б/М'); $bt->setName('Блочно-монолитный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('БЛ'); $bt->setName('Блочный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('БР'); $bt->setName('Брежневка'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('ДЕР'); $bt->setName('Деревянный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('ИНД'); $bt->setName('Индивидуальный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('К/М'); $bt->setName('Кирпично-Монолитный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('К'); $bt->setName('Кирпичный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('КР'); $bt->setName('Корабль'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('КТЖ'); $bt->setName('Коттедж'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('МАН'); $bt->setName('Мансарда'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('М'); $bt->setName('Монолит'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('М/ПН'); $bt->setName('Монолитно-панельный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('НЕМ'); $bt->setName('Немецкий'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('НБЛ'); $bt->setName('Новый Блочный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('ПН'); $bt->setName('Панельный'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('РЕК'); $bt->setName('Реконструкция'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('1ЛГ'); $bt->setName('Серия 1ЛГ-600-I'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('9ОЛО'); $bt->setName('Серия 90ЛО и 90ЛО-м'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('К-СП'); $bt->setName('Серия “Контакт-СП”'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('СФК'); $bt->setName('Ст.Фонд Кап.Рем.'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('СТ'); $bt->setName('Сталинский'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('СФ'); $bt->setName('Старый фонд (СФ)'); $manager->persist($bt);
        $bt = new BuildingType(); $bt->setAbbr('ХР'); $bt->setName('Хрущевка'); $manager->persist($bt);
    
        $manager->flush();
    }
}

?>
