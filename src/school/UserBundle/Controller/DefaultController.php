<?php

namespace school\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('schoolUserBundle:Default:index.html.twig');
    }
}
