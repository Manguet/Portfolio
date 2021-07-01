<?php

namespace App\Controller\Admin;

use App\Entity\Presentation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @author Benjamin Manguet
 *
 * @IsGranted("ROLE_ADMIN")
 */
class PresentationCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }

    /**
     * @param string $pageName
     *
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('presentation', 'Présentation')
                ->setFormType(CKEditorType::class)
            ,
            TextareaField::new('presentationEn', 'Présentation Anglaise')
                ->setFormType(CKEditorType::class)
                ->hideOnIndex()
            ,
            BooleanField::new('isActuallyUsed', 'Utilisé actuellement'),
            TextField::new('liscences', 'Permis'),
            TextField::new('liscencesEn', 'Permis Anglais')
                ->hideOnIndex()
            ,
            TextField::new('locality', 'Origine')
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
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }
}