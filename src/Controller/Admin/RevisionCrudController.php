<?php

namespace App\Controller\Admin;

use App\Entity\Revision;
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

class RevisionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Revision::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            'fecha',
            AssociationField::new('contrato'),
            'albaran',
            'descripcion',
            'copias',
            'toner_entregado',
            'piezas_sustituidas'
        ];

    }
 
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Revisión')
            ->setEntityLabelInPlural('Revisiones')
            ->setSearchFields(['descripcion','contrato.codigo', 'albaran', 'fecha', 'copias', 'toner_entregado','piezas_sustituidas'])
            ->setDefaultSort(['fecha' => 'DESC']);
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('contrato'))
            ->add('albaran')
        ;
    }
}
