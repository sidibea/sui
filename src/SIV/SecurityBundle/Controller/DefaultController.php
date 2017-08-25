<?php

namespace SIV\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIVSecurityBundle:Default:index.html.twig');
    }
}
