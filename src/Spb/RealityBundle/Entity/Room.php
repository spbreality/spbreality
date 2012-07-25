<?php

namespace Spb\RealityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spb\RealityBundle\Entity\Room
 *
 * @ORM\Table(name="t08_room")
 * @ORM\Entity
 */
class Room extends Realty
{
    /**
     * @var smallint $rooms
     *
     * @ORM\Column(name="c08_rooms", type="smallint")
     */
    private $rooms;

    /**
     * Set rooms
     *
     * @param smallint $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Get rooms
     *
     * @return smallint 
     */
    public function getRooms()
    {
        return $this->rooms;
    }
}