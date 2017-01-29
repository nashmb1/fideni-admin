<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 29/01/17
 * Time: 20:22
 */

namespace Fideni\CoreBundle\EventListeners;


use Fideni\CoreBundle\Services\ImageManager;
use Vich\UploaderBundle\Event\Event;

class VIchEventListener
{
    /**
     * @var ImageManager
     */
    private $imageManager;

    /**
     * VIchEventListener constructor.
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function onPostUpload(Event $event)
    {
        $object = $event->getObject();
        $mapping = $event->getMapping();

        $filePath = $mapping->getUploadDestination($object) .'/';
        $fileName = $filePath.$object->getPhoto();

        dump($object, $mapping, $filePath);die;

        $this->imageManager->resizeImage($fileName, $filePath,0, 160);

        // do your stuff with $object and/or $mapping...
    }
}