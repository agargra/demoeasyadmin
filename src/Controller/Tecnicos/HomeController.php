<?php
// src/Controller/Public/HomeController.php
namespace App\Controller\Tecnicos;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// ...

class HomeController  extends AbstractController
{
    /**
     * @Route("/")
     */
		public function indexAction()
    {
        return $this->render('Tecnicos/home.html.twig');
    }		 
		 
}