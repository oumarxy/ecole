<?php

namespace school\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('schoolHomeBundle:Home:index.html.twig');
    }
}
