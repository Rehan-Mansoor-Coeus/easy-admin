<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
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

   public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('title')
            ->add('content');
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the argument must be either one of these strings: 'short', 'medium', 'long', 'full', 'none'
            // (the strings are also available as \EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField::FORMAT_* constants)
            // or a valid ICU Datetime Pattern (see https://unicode-org.github.io/icu/userguide/format_parse/datetime/)
            ->setDateFormat('y-m-d')
            ->setTimeFormat('H.i.s')

            // first argument = datetime pattern or date format; second optional argument = time format
            ->setDateTimeFormat('...', '...')

            ->setDateIntervalFormat('%%y Year(s) %%m Month(s) %%d Day(s)')
            ->setTimezone('...')

            // this option makes numeric values to be rendered with a sprintf()
            // call using this value as the first argument.
            // this option overrides any formatting option for all numeric values
            // (e.g. setNumDecimals(), setRoundingMode(), etc. are ignored)
            // NumberField and IntegerField can override this value with their
            // own setNumberFormat() methods, which works in the same way
            ->setNumberFormat('%.2d');
        ;
    }
}
