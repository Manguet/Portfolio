<?php

namespace App\Controller\Admin;

use App\Entity\Lang;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

/**
 * @author Benjamin Manguet
 */
class LangCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Lang::class;
    }

    /**
     * @param string $pageName
     *
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('altTitle', 'Titre alternatif'),
            TextField::new('locale', 'Locale'),
            TextField::new('lang', 'Langue'),
            TextField::new('level', 'Niveau'),
            TextField::new('levelEn', 'Niveau')
                ->hideOnIndex()
            ,
            ImageField::new('image')
                ->setLabel('image')
                ->setUploadDir('public/build/images')
                ->setBasePath('public/build/images')
                ->onlyOnForms(),
            ImageField::new('imageFile')
                ->setFormType(FileUploadType::class)
                ->hideOnDetail()
                ->hideOnIndex()
                ->hideOnForm()
            ,
        ];
    }

    /**
     * @param Crud $crud
     *
     * @return Crud
     */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@VichUploader/Form/fields.html.twig')
        ;
    }
}