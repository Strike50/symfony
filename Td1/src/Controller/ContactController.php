<?php

namespace App\Controller;

use App\Model\Contact;
use App\Service\ContactSessionManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contacts", name="contact")
     */
    public function index(ContactSessionManager $contactSessionManager)
    {
        $contactSessionManager->deleteAll();
        $contactSessionManager->insert(new Contact("Vitis","Julien"));
        $contactSessionManager->insert(new Contact("Challe","Matthieu"));
        return $this->render('Contact/contact.html.twig', [ "contacts" =>$contactSessionManager->getAll()]);
    }

    /**
     * @Route("/contact/new", name="contact_new")
     */
    public function contactNew(){

        return $this->render('Contact/contact.new.html.twig', [ "contact" => new Contact() ]);
    }

    /**
     * @Route("/contact/edit/{index}", name="contact_edit")
     * @param $index
     */
    public function contactEdit($index,ContactSessionManager $cManager){

        return $this->render('Contact/contact.new.html.twig', [ "contact" => $cManager->get($index),"index"=>$index ]);
    }
    /**
     * @Route("/contact/update", name="contact_update",methods={"POST"})
     */
    public function contactUpdate(Request $request,ContactSessionManager $cManager){
        $index=$request->get("id");
        $contact=$cManager->get($index);
        if(isset($contact)){
            $cManager->update($contact,$request->all());
        }

        return new Response("Update");
    }

    /**
     * @Route("/contact/display/1", name="display1")
     */
    public function display1(){

        return $this->render('@Contact/contact.display1.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
    /**
     * @Route("/contact/search", name="search")
     */
    public function search(){

        return $this->render('@Contact/contact.search.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
    /**
     * @Route("/contact/select", name="select")
     */
    public function select(){

        return $this->render('@Contact/contact.select.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
    /**
     * @Route("/contact/delete", name="delete")
     */
    public function delete(){

        return $this->render('@Contact/contact.delete.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }

}
