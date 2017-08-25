<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/23/17
 * Time: 8:33 PM
 */

namespace SIV\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatsController extends Controller {

    public function indexAction(){

        $em = $this->getDoctrine()->getManager();

        $monthlyVisitors = $em->getRepository('SIVMainBundle:Visites')->dailyVisitors();


        return $this->render('SIVMainBundle:Stats:index.html.twig', [
            'monthlyVisitors' => $monthlyVisitors
        ]);
    }

}