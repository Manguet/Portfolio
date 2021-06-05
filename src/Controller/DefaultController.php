<?php

namespace App\Controller;

use App\Entity\Lang;
use App\Entity\Presentation;
use App\Entity\Production;
use App\Entity\Skill;
use App\Entity\SoftSkill;
use App\Entity\Testimony;
use App\Entity\Tool;
use App\Entity\User;
use App\Form\ContactType;
use App\Interfaces\AgeCalculatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3Validator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Benjamin Manguet <benjamin.manguet@gmail.com>
 *
 * @Route("/", name="index")
 */
class DefaultController extends AbstractController
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @param MailerInterface $mailer
     * @param KernelInterface $kernel
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(MailerInterface $mailer, KernelInterface $kernel,
                                EntityManagerInterface $entityManager)
    {
        $this->mailer        = $mailer;
        $this->kernel        = $kernel;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", name="no_locale")
     *
     * @return RedirectResponse
     */
    public function indexWithoutLocale(): RedirectResponse
    {
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("{_locale}/", name="", requirements={"_locale": "en|fr"})
     *
     * @param Request $request
     * @param Recaptcha3Validator $recaptcha3Validator
     * @param AgeCalculatorInterface $ageCalculator
     *
     * @return Response
     *
     * @throws TransportExceptionInterface
     */
    public function index(Request $request, Recaptcha3Validator $recaptcha3Validator,
                          AgeCalculatorInterface $ageCalculator): Response
    {
        $user = $this->entityManager->getRepository(User::class)
            ->find(1);

        $age = $ageCalculator->getAge($user);

        $presentation = $this->entityManager->getRepository(Presentation::class)
            ->findOneBy(['isActuallyUsed' => true]);

        $skills = $this->getSkills();

        $softSkills = $this->getSoftSkills();

        $langs = $this->entityManager->getRepository(Lang::class)
            ->findAll();

        $realisations = $this->entityManager->getRepository(Production::class)
            ->findAll();

        $testimonies = $this->entityManager->getRepository(Testimony::class)
            ->findAll();

        $tool = $this->entityManager->getRepository(Tool::class)
            ->find(1);

        $contactForm = $this->createForm(ContactType::class);

        $contactForm->handleRequest($request);

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {

            if ($recaptcha3Validator->getLastResponse() && $recaptcha3Validator->getLastResponse()->isSuccess()) {

                $this->sendMail($contactForm->getData());

                $this->addFlash('success', 'Merci pour votre message. Il a bien été envoyé. Je vous répondrai dans les plus bref délais.');

                return $this->redirectToRoute('index');

            }

            $this->addFlash('warning', 'Une erreur s\'est produite, merci de réessayer ultérieurement');

            return $this->redirectToRoute('index');

        }

        return $this->render('index.html.twig', [
            'form'         => $contactForm->createView(),
            'user'         => $user ?? null,
            'age'          => $age ?? null,
            'presentation' => $presentation,
            'skills'       => $skills,
            'softSkills'   => $softSkills,
            'langs'        => $langs,
            'realisations' => $realisations,
            'testimonies'  => $testimonies,
            'tool'         => $tool
        ]);
    }

    /**
     * @param array $formData
     *
     * @return void
     *
     * @throws TransportExceptionInterface
     */
    private function sendMail(array $formData): void
    {
        $email = (new Email())
            ->from(new Address('benjamin.manguet@gmail.com', 'Portfolio site'))
            ->to('benjamin.manguet@gmail.com')
            ->subject('Demande de contact sur le portfolio')
            ->html($this->renderView('contact_email.html.twig', [
                'formData' => $formData
            ]))
        ;

        $this->mailer->send($email);
    }

    /**
     * @Route("{_locale}/download", name="_cv", requirements={"_locale": "en|fr"})
     *
     * @return BinaryFileResponse
     */
    public function downloadCV(): BinaryFileResponse
    {
        $cv = $this->kernel->getProjectDir() . '/documents/Benjamin_MANGUET_CV.pdf';

        $response = new BinaryFileResponse($cv);

        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename=Benjamin_MANGUET_CV.pdf');

        return $response;
    }

    /**
     * @return array
     */
    protected function getSkills(): array
    {
        $allSkills = $this->entityManager->getRepository(Skill::class)
            ->getSkillsByReference();

        $skills = [];
        foreach ($allSkills as $key => $skill) {

            $reference = preg_replace('/[0-9]+/', '', $key);

            $skills[$reference][] = $skill;
        }

        return $skills;
    }

    /**
     * @return array
     */
    protected function getSoftSkills(): array
    {
        $allSoftSkills = $this->entityManager->getRepository(SoftSkill::class)
            ->getSoftSkillsByReference();

        $softSkills = [];
        foreach ($allSoftSkills as $key => $softSkill) {

            $reference = preg_replace('/[0-9]+/', '', $key);

            $softSkills[$reference][] = $softSkill;
        }

        return $softSkills;
    }
}