<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX , Action::DETAIL)
            ->update(Crud::PAGE_INDEX , Action::NEW,function (Action $action){
                return $action->setIcon('fa fa-user');
            })
            ->update(Crud::PAGE_INDEX , Action::DETAIL,function (Action $action){
                return $action->setIcon('fa fa-eye')->addCssClass('btn btn-success');
            })
            ->update(Crud::PAGE_INDEX , Action::DELETE,function (Action $action){
            return $action->setIcon('fa fa-trash')->addCssClass('btn ');
            })
                ->update(Crud::PAGE_INDEX , Action::EDIT,function (Action $action){
                return $action->setIcon('fa fa-pencil')->addCssClass('btn btn-warning');
            });
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('password')->hideOnIndex(),
            ImageField::new('Image')
            ->setBasePath('image/user')
            ->setUploadDir('public/image/user')
            ->setUploadedFileNamePattern('[randomhash].[extention]')
            ->setRequired(false)
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('email');
    }



}
