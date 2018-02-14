<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Td2Controller extends Controller
{
    /**
     * @Route("/td2", name="td2")
     */
    public function index()
    {
        return new Response('Welcome to your new controller!');
    }
}
