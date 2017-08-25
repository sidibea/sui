<?php

namespace SIV\EmpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIVEmpBundle:Default:index.html.twig');
    }
}
