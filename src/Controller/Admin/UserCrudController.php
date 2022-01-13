<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
                return $action->setIcon('fa fa-user')->addCssClass('btn btn-warning');
            })
            ->update(Crud::PAGE_INDEX , Action::NEW,function (Action $action){
                return $action->setIcon('fa fa-user')->addCssClass('btn btn-warning');
            });
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('password')->hideOnIndex()
        ];
    }

}
