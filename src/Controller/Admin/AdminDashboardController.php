<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Marca;
use App\Entity\Dispositivo;
use App\Entity\Cliente;
use App\Entity\Contrato;
use App\Entity\Revision;

use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminDashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ContratoCrudController::class)->generateUrl();

        return $this->redirect($url);				
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Demo - Mantenimiento dispositivos');
    }

		public function configureUserMenu(UserInterface $user): UserMenu
		{
				$userMenu = parent::configureUserMenu($user);
				$userMenu->setMenuItems([]);
				return $userMenu;
		}

    public function configureMenuItems(): iterable
    {
				return [
						//MenuItem::linktoDashboard('Dashboard', 'fa fa-home');				
						MenuItem::linkToCrud('Marcas', 'fas fa-trademark', Marca::class),
						MenuItem::linkToCrud('Dispositivos', 'fas fa-print', Dispositivo::class),
						MenuItem::linkToCrud('Clientes', 'fas fa-user', Cliente::class),
						MenuItem::linkToCrud('Contratos', 'fas fa-file-contract', Contrato::class),
						MenuItem::linkToCrud('Revisiones', 'fas fa-wrench', Revision::class),		
				];			
    }
}
