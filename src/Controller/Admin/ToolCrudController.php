<?php

namespace App\Controller\Admin;

use App\Entity\Tool;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

/**
 * @author Benjamin Manguet
 */
class ToolCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return Tool::class;
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
            TextField::new('host', 'Hébergeur'),
            TextField::new('hostAddress', 'Adresse hébergeur')
                ->hideOnIndex(),
            TextField::new('hostAddress2', 'Complément adresse hébergeur')
                ->hideOnIndex(),
            TextField::new('hostPostalCode', 'Code postal hébergeur')
                ->hideOnIndex(),
            TextField::new('hostCity', 'Ville hébergeur')
                ->hideOnIndex(),
            TextField::new('hostCountry', 'Pays hébergeur')
                ->hideOnIndex(),
            TextField::new('societyName', 'Nom de la société')
                ->hideOnIndex(),
        ];
    }
}