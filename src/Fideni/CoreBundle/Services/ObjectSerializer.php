<?php

namespace Fideni\CoreBundle\Services;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Created by PhpStorm.
 * User: nharouna
 * Date: 24/01/17
 * Time: 09:29
 */
class ObjectSerializer
{


    /**
     * @param $object
     * @return array|object|\Symfony\Component\Serializer\Normalizer\scalar
     */
    public function normalize($object)
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->normalize($object);
    }
}