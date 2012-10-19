<?php
// src/Spb/RealtyBundle/Form/DataTransformer/RealtyToNumberTransformer.php
namespace Spb\RealityBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Spb\RealityBundle\Entity\Realty;

class RealtyToNumberTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (issue) to a string (number).
     *
     * @param  Realty|null $realty
     * @return string
     */
    public function transform($realty)
    {
        if (null === $realty) {
            return "";
        }

        return $realty->getId();
    }

    /**
     * Transforms a string (number) to an object (realty).
     *
     * @param  string $number
     * @return Realty|null
     * @throws TransformationFailedException if object (issue) is not found.
     */
    public function reverseTransform($number)
    {
        if (!$number) {
            return null;
        }

        $realty = $this->om
            ->getRepository('SpbRealtyBundle:Realty')->find($number);

        if (null === $realty) {
            throw new TransformationFailedException(sprintf(
                'Объекта недвижимости под номером "%s" не существует!',
                $number
            ));
        }

        return $realty;
    }
}

?>
