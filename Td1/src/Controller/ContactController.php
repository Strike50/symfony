<?php

namespace App\Controller;

use App\Model\Contact;
use App\Service\ContactSessionManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(ContactSessionManager $contactSessionManager)
    {
        $contactSessionManager->deleteAll();
        $contactSessionManager->insert(new Contact("FRO","Ben"));
        return $this->render('Contact/contact.html.twig', [ "contacts" =>$contactSessionManager->getAll()]);
    }

    /**
     * @Route("/contact/new", name="new")
     */
    public function new(){

        return $this->render('@Contact/contact.new.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
    /**
     * @Route("/contact/edit/1", name="edit1")
     */
    public function edit1(){

        return $this->render('@Contact/contact.edit1.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
    }
    /**
     * @Route("/contact/update", name="update")
     */
    public function update(){

        return $this->render('@Contact/contact.update.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
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

        return $this->render('@Contact/contact.seach.html.twig', [ 'path' => str_replace($this->getParameter('kernel.project_dir').'/', '', __FILE__) ]);
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
