<?php
// src/Spb/RealityBundle/Document/Product.php
namespace Spb\RealityBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Realty - объект недвижимости
 *
 * @author Denis Olinam
 * 
 * @MongoDB\Document
 */

class Realty {
    
    /**
     * @MongoDB\Id
     */
    protected $id;    
    
    /**
     * @MongoDB\String
     */
    protected $category;

    /**
     * @MongoDB\String
     */
    protected $type;    
}

?>
