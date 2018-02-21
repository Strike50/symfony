<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Td2Controller extends Controller
{
    private $contactRepo;

    public function __construct(ContactRepository $contactRepo){
        $this->contactRepo=$contactRepo;
    }

    /**
     * @Route("/contact/new",name="contact_new")
     */
    public function contactNew(){
        return $this->render();
    }
    /**
     * @Route("/td2", name="td2")
     */
    public function index()
    {
        return new Response('Welcome to your new controller!');
    }
}
