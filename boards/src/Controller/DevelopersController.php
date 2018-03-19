<?php

namespace App\Controller;

use Ajax\semantic\html\base\constants\Color;
use App\Entity\Developer;
use App\Repository\DevelopersRepository;
use App\Repository\TagRepository;
use App\Services\semantic\DevelopersGui;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DevelopersController extends Controller
{
    /**
     * @Route("/developers", name="developers")
     */
    public function index(DevelopersGui $gui,DevelopersRepository $devRepo)
    {
        $devs=$devRepo->findAll();
        $dt=$gui->dataTable($devs);
        return $gui->renderView('Developers\all.html.twig');
    }

    /**
     * @Route("developer/submit", name="developer_submit")
     */
    public function submit(Request $request,DevelopersRepository $devRepo){
        $dev=$devRepo->find($request->get("id"));
        if(isset($dev)){
            $dev->setIdentity($request->get("identity"));
            $devRepo->insert($dev);
        }
        return $this->forward("App\Controller\DevelopersController::developers");

    }
}
