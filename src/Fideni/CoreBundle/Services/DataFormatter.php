<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 07/02/17
 * Time: 22:43
 */

namespace Fideni\CoreBundle\Services;


use Liip\ImagineBundle\Controller\ImagineController;
use Symfony\Component\HttpFoundation\Request;

class DataFormatter
{
    /**
     * @var ObjectSerializer
     */
    private $serializer;
    /**
     * @var ImagineController
     */
    private $imagine;

    /**
     * @var
     */
    private $uploadDir;

    /**
     * DataFormatter constructor.
     * @param ObjectSerializer $serializer
     * @param ImagineController $imagine
     * @param $uploadDir
     */
    public function __construct(ObjectSerializer $serializer, ImagineController $imagine, $uploadDir)
    {
        $this->serializer = $serializer;
        $this->imagine = $imagine;
        $this->uploadDir = $uploadDir;
    }

    /**
     * @param $data
     * @return array|object|\Symfony\Component\Serializer\Normalizer\scalar
     */
    public function format($data, $userId)
    {
        $array = $this->serializer->normalize($data);
        $return = [];
        foreach ($array as $item) {
            $response = $this->imagine
                ->filterAction(
                    new Request(),
                    $this->uploadDir . $item['photo'],
                    'my_thumb'
                );
            if ($item['id'] != $userId) {
                $return[] = $item;
            }

        }
        return $return;
    }
}