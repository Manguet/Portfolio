<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/admin/user", name="_user")
 *
 * @IsGranted("ROLE_ADMIN")
 *
 * @author Benjamin Manguet
 */
class UserCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    /**
     * @param string $pageName
     *
     * @return iterable
     */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email', 'E-Mail'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            TextField::new('phone', 'Téléphone'),
            TextField::new('phone2', 'Portable'),
            TextField::new('isAvailable', 'Disponible ?'),
            TextField::new('address', 'Adresse')
                ->onlyOnForms(),
            TextField::new('address2', 'Complément d\'adresse')
                ->onlyOnForms(),
            TextField::new('postalCode', 'Code postal')
                ->onlyOnForms(),
            TextField::new('city', 'Ville')
                ->onlyOnForms(),
            TextField::new('country', 'Pays')
                ->onlyOnForms(),
            TextField::new('workAt', 'Zone de travail')
                ->onlyOnForms(),
            DateField::new('birthdate', 'Date de naissance')
                ->onlyOnForms(),
        ];
    }
}