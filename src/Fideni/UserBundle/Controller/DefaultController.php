<?php

namespace Fideni\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FideniUserBundle:Default:index.html.twig');
    }
}
