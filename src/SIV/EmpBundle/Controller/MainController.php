<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/20/17
 * Time: 5:30 PM
 */

namespace SIV\EmpBundle\Controller;


use SIV\MainBundle\Entity\Visites;
use SIV\MainBundle\Form\EmpVisitesType;
use SIV\MainBundle\Form\VisitesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller {

    public function indexAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $visites = new Visites();
        $form = $this->createForm(new EmpVisitesType(), $visites);

        if ($form->handleRequest($request)->isValid()) {

            $visites->setDateSortie("null");
            $visites->setHeureSortie("null");
            $visites->setDateEntree(date("Y-m-d", strtotime($form->get('dateEntree')->getData())));

            $visites->setHote($user);

            $em->persist($visites);
            $em->flush();


            $request->getSession()->getFlashBag()->add('notice', 'La visite a été enregistré.');

            return $this->redirect($this->generateUrl('siv_emp_visiteurs_present'));

        }

        return $this->render('SIVEmpBundle::index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function vprensentAction(){

        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();


        $vpresents = $em->getRepository('SIVMainBundle:Visites')->getEmpVisiteurs($user->getId());

        return $this->render('SIVEmpBundle::vpresent.html.twig', [
            'vpresents' => $vpresents,

        ]);
    }

    public function vEditAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $visites = $em->getRepository('SIVMainBundle:Visites')->find($id);

        $form = $this->createForm(new EmpVisitesType(), $visites);

        if ($form->handleRequest($request)->isValid()) {


            $em->flush();
            $visites->setDateEntree(date("Y-m-d", strtotime($form->get('dateEntree')->getData())));


            $request->getSession()->getFlashBag()->add('notice', 'La visite a été enregistré.');

            return $this->redirect($this->generateUrl('siv_emp_visiteurs_present'));

        }

        return $this->render('SIVEmpBundle::edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function vSortieAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $visites = $em->getRepository('SIVMainBundle:Visites')->find($id);

        $visites->setDateSortie(date('d/m/Y'));
        $visites->setHeureSortie(date('h:i'));

        $em->flush();
        return $this->redirect($this->generateUrl('siv_emp_visiteurs_historique'));

    }

    public function historiqueAction(){

        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();


        $visiteurs = $em->getRepository('SIVMainBundle:Visites')->findEmpVisiteHistory($user->getId());

        return $this->render('SIVEmpBundle::historique.html.twig', [
            'visiteurs' => $visiteurs
        ]);
    }

}