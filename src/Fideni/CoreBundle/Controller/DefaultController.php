<?php

namespace Fideni\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FideniCoreBundle:Default:index.html.twig');
    }
}