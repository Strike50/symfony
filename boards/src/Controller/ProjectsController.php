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
    /**
     * @Route("/index", name="index")
     */
    public function index(ProjectsGui $gui){
        $gui->buttons();
        return $gui->renderView('Projects\index.html.twig');
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function all(ProjectsGui $gui,ProjectRepository $projectRepo){
        $projects=$projectRepo->findAll();
        $dt=$gui->dataTable($projects);
        return $gui->renderView('Projects\all.html.twig');
    }
}