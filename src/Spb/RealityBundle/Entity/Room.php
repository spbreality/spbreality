<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Room
 *
 * @ORM\Table(name="t08_room")
 * @ORM\Entity(repositoryClass="Spb\RealityBundle\Entity\RoomRepository")
 */
class Room extends Apartment
{   
    /**
     * всего комнат (number of rooms)
     * 
     * @var smallint $nr
     * 
     * @ORM\Column(name="c08_nr", type="smallint")
     */
    private $nr;

    /**
     * количество съемщиков (number of tenants)
     * 
     * @var smallint $nt
     * 
     * @ORM\Column(name="c08_nt", type="smallint")
     */
    private $nt;

    /**
     * количество соседей (number of neighbours)
     * 
     * @var smallint $nn
     * 
     * @ORM\Column(name="c08_nn", type="smallint")
     */
    private $nn;
    
    /**
     * Set nr
     *
     * @param smallint $nr
     */
    public function setNr($nr)
    {
        $this->nr = $nr;
    }

    /**
     * Get nr
     *
     * @return smallint 
     */
    public function getNr()
    {
        return $this->nr;
    }

    /**
     * Set nt
     *
     * @param smallint $nt
     */
    public function setNt($nt)
    {
        $this->nt = $nt;
    }

    /**
     * Get nt
     *
     * @return smallint 
     */
    public function getNt()
    {
        return $this->nt;
    }

    /**
     * Set nn
     *
     * @param smallint $nn
     */
    public function setNn($nn)
    {
        $this->nn = $nn;
    }

    /**
     * Get nn
     *
     * @return smallint 
     */
    public function getNn()
    {
        return $this->nn;
    }
    
    /**
     * Get realty type
     *
     * @return string 
     */
    public function getRealtyType()
    {
        return "room";
    }
    

}