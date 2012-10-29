<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Flat
 *
 * @ORM\Table(name="t04_flat")
 * @ORM\Entity(repositoryClass="Spb\RealityBundle\Entity\FlatRepository")
 */
class Flat extends Apartment
{

    /**
     * общая площадь
     * 
     * @var decimal $s
     *
     * @ORM\Column(name="c04_s", type="decimal", scale=2)
     */
    private $s;

    /**
     * Set s
     *
     * @param decimal $s
     */
    public function setS($s)
    {
        $this->s = $s;
    }

    /**
     * Get s
     *
     * @return decimal 
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Get realty type
     *
     * @return string 
     */
    public function getRealtyType($lang = "en", $pl = "single", $camel = "no")
    {
        $rstr = "flat";        
        
        if ($lang === "ru") {
            if($pl === "plural") {
                $rstr = "квартиры";
            }
            $rstr = "квартира";                
        }
        
        if ($camel === "camel") {
            $rstr = ucwords($rstr);
        }
        
        return $rstr;
    }

}