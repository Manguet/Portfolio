<?php

namespace App\Controller\Admin;

use App\Entity\SoftSkill;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @author Benjamin Manguet
 *
 * @IsGranted("ROLE_ADMIN")
 */
class SoftSkillCrudController extends AbstractCrudController
{
    /**
     * @return string
     */
    public static function getEntityFqcn(): string
    {
        return SoftSkill::class;
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
            TextField::new('titleEn', 'Titre Anglais')
                ->hideOnIndex()
            ,
            TextField::new('reference', 'Référence'),
            TextField::new('icon', 'Icon'),
        ];
    }
}