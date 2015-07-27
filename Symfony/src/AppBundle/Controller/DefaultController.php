<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Entity\Contact;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
		
        return $this->render('default/index.html.twig');
    }
	
	/**
     * @Route("/affichage", name="affichage")
     */
    public function affichageAction()
    {
		$affichrepo = $this->get("doctrine")->getRepository("AppBundle:User");
        $liste = $affichrepo->findAll();
		
		$param=array(
            'listes'=>$liste
            );
		
		
        return $this->render('default/affichage.html.twig',$param);
    }
	
	/**
    * @Route("/ajout/{id}", name="ajout") 
    */
    public function ajoutAction($id)
    {
        $em=$this->get("doctrine")->getManager();
		
		//$contactrepo=$this->get("doctrine")->getRepository("AppBundle:Contact");
		$userrepo=$this->get("doctrine")->getRepository("AppBundle:User");
		$new = $userrepo->find($id);
		
		$user=$this->getUser();
		
		$contact= new Contact();
        $contact->setDateAjout(new \DateTime());
		$contact->setProprietaire($user);
		$contact->setContact($new);
		
		$em->persist($contact);
        $em->flush();
        
            
        return $this->redirectToRoute('affichage');
	}
	
	/**
     * @Route("/contacts", name="contacts")
     */
    public function contactAction()
    {
		$affichrepo = $this->get("doctrine")->getRepository("AppBundle:Contact");
        $liste = $affichrepo->findByProprietaire($this->getUser());
		
		$param=array(
            'listes'=>$liste
            );
		
		
        return $this->render('default/contact.html.twig',$param);
    }
	
	/**
    * @Route("/delete/{id}", name="delete") 
    */
    public function deleteAction($id)
    {
        $em=$this->get("doctrine")->getManager();
        $contactrepo=$this->get("doctrine")->getRepository("AppBundle:Contact");
        $user=$this->getUser();
		$userrepo=$this->get("doctrine")->getRepository("AppBundle:User");
		$new = $userrepo->find($id);
        
        $contact=$contactrepo->findOneBy(array('proprietaire'=>$user, 'contact'=>$new));
		
		$em->remove($contact);
        $em->flush();
        return $this->redirectToRoute('contacts');
	}

	
}
