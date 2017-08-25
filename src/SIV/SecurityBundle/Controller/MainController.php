<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/21/17
 * Time: 11:20 PM
 */

namespace SIV\SecurityBundle\Controller;


use SIV\MainBundle\Entity\Visites;
use SIV\MainBundle\Form\VisitesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller{

    public function indexAction(Request $request){

        $em = $this->getDoctrine()->getManager();

        $visites = new Visites();
        $form = $this->createForm(new VisitesType(), $visites);

        if ($form->handleRequest($request)->isValid()) {

            $visites->setDateSortie("null");
            $visites->setHeureSortie("null");
            $visites->setDateEntree(date("Y-m-d", strtotime($form->get('dateEntree')->getData())));

            $em->persist($visites);
            $em->flush();


            $request->getSession()->getFlashBag()->add('notice', 'La visite a été enregistré.');

            return $this->redirect($this->generateUrl('siv_security_visiteurs_present'));

        }

        return $this->render('SIVSecurityBundle::index.html.twig',[
            'form' => $form->createView()
        ]);
    }

    public function VpresentAction(){

        $em = $this->getDoctrine()->getManager();

        $vpresents = $em->getRepository('SIVMainBundle:Visites')->getPresent();

        return $this->render('SIVSecurityBundle::vpresent.html.twig', [
            'vpresents' => $vpresents,

        ]);
    }
    public function historiqueAction(){

        $em = $this->getDoctrine()->getManager();

        $visiteurs = $em->getRepository('SIVMainBundle:Visites')->findAll();

        return $this->render('SIVSecurityBundle::historique.html.twig', [
            'visiteurs' => $visiteurs
        ]);
    }

    public function vEditAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $visites = $em->getRepository('SIVMainBundle:Visites')->find($id);

        $form = $this->createForm(new VisitesType(), $visites);

        if ($form->handleRequest($request)->isValid()) {
            $visites->setDateEntree(date("Y-m-d", strtotime($form->get('dateEntree')->getData())));


            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'La visite a été enregistré.');

            return $this->redirect($this->generateUrl('siv_main_visiteurs_present'));

        }

        return $this->render('SIVSecurityBundle::edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function vSortieAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $visites = $em->getRepository('SIVMainBundle:Visites')->find($id);

        $visites->setDateSortie(date('Y-m-d'));
        $visites->setHeureSortie(date('h:i'));

        $em->flush();
        return $this->redirect($this->generateUrl('siv_main_visiteurs_historique'));

    }

}