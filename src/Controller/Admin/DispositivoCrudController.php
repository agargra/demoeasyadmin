<?php

namespace App\Controller\Admin;

use App\Entity\Dispositivo;
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

class DispositivoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dispositivo::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            'num_serie',
            AssociationField::new('marca'),
            'modelo',
        ];
    }

		
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Dispositivo')
            ->setEntityLabelInPlural('Dispositivos')
            ->setSearchFields(['num_serie', 'modelo', 'marca.nombre'])
            ->setDefaultSort(['marca' => 'ASC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('marca'))
        ;
    }
		
		
}
