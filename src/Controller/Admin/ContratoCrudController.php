<?php

namespace App\Controller\Admin;

use App\Entity\Contrato;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class ContratoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contrato::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            'codigo',
            AssociationField::new('cliente'),
            AssociationField::new('dispositivo'),
            'fecha',
            'periodicidad',
            'millar_inicial',
            'millar_actual'
        ];				
    }
 
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Contrato')
            ->setEntityLabelInPlural('Contratos')
            ->setSearchFields(['codigo', 'fecha', 'cliente.nombre', 'cliente.contacto', 'dispositivo.marca', 'dispositivo.modelo', 'dispositivo.num_serie'])
            ->setDefaultSort(['codigo' => 'ASC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('cliente'))
            ->add(EntityFilter::new('dispositivo'))
        ;
    }
 
}
