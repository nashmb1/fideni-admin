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

        return new JsonResponse([
            'nbFoundedProject'   => $this->getDoctrine()->getRepository('FideniCoreBundle:Project')->count(true),
            'nbNotYetFoundedProject'   => $this->getDoctrine()->getRepository('FideniCoreBundle:Project')->count(false),
            'nbPartners'    => $this->getDoctrine()->getRepository('FideniUserBundle:User')->count(),
            'shares'       => 26
        ]);
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

      return new JsonResponse($this->get('fideni_core.object_serializer')->normalize($result));
    }

    public function getAllProjectsAction($status){

    }

    public function getUserShareAction(){

    }

}
