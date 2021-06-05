<?php

namespace App\Form;

use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @author Benjamin Manguet
 */
class ContactType extends AbstractType
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * ContactType constructor.
     *
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label'    => $this->translator->trans('Nom ou raison sociale*'),
                'required' => true,
                'attr'     => [
                    'placeholder' => $this->translator->trans('Nom ou raison sociale (obligatoire)')
                ],
                'label_attr' => [
                    'class' => 'blue'
                ],
            ])
            ->add('firstname', TextType::class, [
                'label'    => $this->translator->trans('Prénom'),
                'required' => false,
                'attr'     => [
                    'placeholder' => $this->translator->trans('Prénom')
                ],
                'label_attr' => [
                    'class' => 'blue'
                ],
            ])
            ->add('contact', ChoiceType::class, [
                'label'    => $this->translator->trans('Contact'),
                'required' => false,
                'choices'  => [
                    $this->translator->trans('Particulier')  => 'user',
                    $this->translator->trans('Professionel') => 'society'
                ],
                'placeholder' => $this->translator->trans('Quel type d\'utilisateur êtes-vous ?'),
                'label_attr'  => [
                    'class' => 'blue'
                ],
            ])
            ->add('phone', TextType::class, [
                'label'    => $this->translator->trans('Numéro de téléphone'),
                'required' => false,
                'attr'     => [
                    'placeholder' => $this->translator->trans('Numéro de téléphone')
                ],
                'label_attr' => [
                    'class' => 'blue'
                ],
            ])
            ->add('email', TextType::class, [
                'label'    => $this->translator->trans('Email'),
                'required' => false,
                'attr'     => [
                    'placeholder' => $this->translator->trans('Email')
                ],
                'label_attr' => [
                    'class' => 'blue'
                ],
            ])
            ->add('message', TextareaType::class, [
                'label'    => $this->translator->trans('Votre message*'),
                'required' => true,
                'attr'     => [
                    'placeholder' => $this->translator->trans('Votre message (obligatoire)')
                ],
                'label_attr' => [
                    'class' => 'blue'
                ],
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'required'    => true,
                'action_name' => 'homepage',
                'label_attr'  => [
                    'class' => 'invisible'
                ],
                'constraints' => new Recaptcha3 ([
                    'message'             => $this->translator->trans('Il semble y avoir un problème avec le captcha, merci d\'éssayer à nouveau'),
                    'messageMissingValue' => $this->translator->trans('Le captcha n\'a pas été rempli'),
                ]),
            ])
            ->add('save', SubmitType::class, [
                'label' => $this->translator->trans('Envoyer'),
                'attr'  => [
                    'class' => 'custom-button button-blue border-blue',
                ],
            ])
        ;
    }
}