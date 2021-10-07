<?php

namespace App\Controller\Admin;

use App\Entity\Cliente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClienteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cliente::class;
    }

}
