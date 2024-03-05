<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInPlural('Utislisateurs')
        ->setEntityLabelInSingular('Utislisateur')
        ->setPageTitle('index',"Freeimmo - Administration des utilisateurs")
        ->setPaginatorPageSize(10);
      
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('email')
            ->setFormTypeOption('disabled', 'disabled'),
            ArrayField::new('roles')
            ->hideOnIndex(),
            DateTimeField::new('createdAt')
             ->hideOnForm()
            ->setFormTypeOption('disabled', 'disabled'),
        ];
    }
 
}
