<?php

namespace SIV\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SIVUsersBundle:Default:index.html.twig');
    }
}
