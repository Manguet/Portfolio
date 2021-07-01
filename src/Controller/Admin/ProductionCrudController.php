<?php

namespace App\Controller\Admin;

use App\Entity\Production;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @author Benjamin Manguet
 *
 * @IsGranted("ROLE_ADMIN")
 */
class ProductionCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Production::class;
    }

    /**
     * @param string $pageName
     *
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('site', 'Site'),
            TextField::new('title', 'Titre'),
            TextField::new('altTitle', 'Titre alternatif'),
            TextareaField::new('presentation', 'Présentation')
                ->setFormType(CKEditorType::class)
            ,
            TextareaField::new('presentationEn', 'Présentation Anglaise')
                ->setFormType(CKEditorType::class)
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
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }
}