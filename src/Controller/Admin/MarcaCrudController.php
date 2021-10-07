<?php

namespace App\Controller\Admin;

use App\Entity\Marca;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MarcaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Marca::class;
    }

}
