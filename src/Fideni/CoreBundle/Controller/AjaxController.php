<?php

namespace Fideni\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends Controller
{
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

    public function getAllUsersAction(){

    }

    public function getAllProjectsAction($status){

    }

    public function getUserShareAction(){

    }

}
