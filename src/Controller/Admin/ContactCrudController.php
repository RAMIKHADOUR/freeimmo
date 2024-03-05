<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

     public function configureCrud(Crud $crud): Crud
    {
        return $crud
         ->setEntityLabelInSingular('Demands de contact')
        ->setEntityLabelInPlural('Demand de contacts')
        ->setPageTitle('index',"Freeimmo - Administration des demands de contact")
        ->setPaginatorPageSize(20)
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }


    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->hideOnIndex(),
            TextField::new('nom'),
                  TextField::new('prenom'),
                        TextField::new('phone'),
                              TextField::new('email'),
                                    TextField::new('sujet'),
            TextEditorField::new('message')
            ->setFormType(CKEditorType::class),

            DateTimeField::new('createdAt'),
        ];
    }
    
}
