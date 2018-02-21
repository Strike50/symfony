<?php
/**
 * Created by PhpStorm.
 * User: lhoul
 * Date: 21/02/2018
 * Time: 08:53
 */
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Services\semantic\ProjectsGui;
use App\Repository\ProjectRepository;

class ProjectsController extends Controller
{
    public function __construct()
    {
    }
    /**
     * @Route("/index", name="index")
     */
    public function index(ProjectsGui $gui){
        $gui->buttons();
        return $gui->renderView('Projects/index.html.twig');
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function all(ProjectRepository $projectRepo){
        $projects=$projectRepo->findAll();
        return $this->render('Projects/all.html.twig',["projects"=>$projects]);
    }
}