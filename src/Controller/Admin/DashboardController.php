<?php

namespace App\Controller\Admin;

use App\Entity\Lang;
use App\Entity\Presentation;
use App\Entity\Production;
use App\Entity\Skill;
use App\Entity\SoftSkill;
use App\Entity\Testimony;
use App\Entity\Tool;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/admin", name="admin")
 *
 * @IsGranted("ROLE_ADMIN")
 *
 * @author Benjamin Manguet
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("", name="")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    /**
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    /**
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Données personnelles', 'fas fa-user-secret', User::class);
        yield MenuItem::linkToCrud('Présentation', 'fas fa-paragraph', Presentation::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-laptop-code', Skill::class);
        yield MenuItem::linkToCrud('Soft Skills', 'fas fa-hands', SoftSkill::class);
        yield MenuItem::linkToCrud('Langues', 'fas fa-flag', Lang::class);
        yield MenuItem::linkToCrud('Réalisations', 'fas fa-briefcase', Production::class);
        yield MenuItem::linkToCrud('Témoignages', 'far fa-comment', Testimony::class);
        yield MenuItem::linkToCrud('Configuration', 'fas fa-tools', Tool::class);
    }
}
