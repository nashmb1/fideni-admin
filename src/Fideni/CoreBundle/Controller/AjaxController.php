<?php

namespace Fideni\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AjaxController
 * @package Fideni\CoreBundle\Controller
 */
class AjaxController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getGlobalStatsAction(){

        $object = $this->getDoctrine()->getRepository('FideniCoreBundle:Fideni')->findOneBy([]);
        
        return new JsonResponse($this->get('fideni_core.object_serializer')->normalize($object));
    }

    public function projectsAction()
    {

    }

    /**
     * @return JsonResponse
     */
    public function getAllUsersAction()
    {
        $result = $this->getDoctrine()->getRepository('FideniUserBundle:User')->findAll();

        return new JsonResponse($this->get('fideni_core.data_formatter')->format($result, $this->getUser()->getId()));
    }

    public function getAllProjectsAction($status){

    }

    public function getUserShareAction(){

    }

    /**
     *
     */
    public function getGeneralInformation()
    {

    }

}
