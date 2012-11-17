<?php

namespace Spb\RealityBundle\Entity\Search;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Spb\RealityBundle\Entity\Search\Flat
 *
 */
class RoomSearch extends ApartmentSearch
{
    public function buildSearchQuery()
    {
        parent::buildSearchQuery();
                
        return $this;
    }    

}