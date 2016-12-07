<?php

namespace Fideni\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends Controller
{
    public function getGlobalStatsAction(){
        return new JsonResponse([
            'bnProject' => 47,
            'nbUser'    => $this->getDoctrine(),
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
