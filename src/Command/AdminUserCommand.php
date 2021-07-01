<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @author Benjamin Manguet
 */
class AdminUserCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:create-user';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * AdminUserCommand constructor.
     *
     * @param string|null $name
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder,
                                EntityManagerInterface $entityManager,
                                string $name = null)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager   = $entityManager;

        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setDescription('Create the only user.')
            ->setHelp('This command allows you to create a user...')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output*
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Import de l\'administrateur');

        $user = new User();

        $user
            ->setEmail($_ENV['ADMIN_EMAIL'])
            ->setRoles($_ENV['ADMIN_ROLE'])
            ->setFirstname('Benjamin')
            ->setLastName('Manguet')
            ->setIsAvailable('true')
        ;

        $password = $this->passwordEncoder->encodePassword($user, $_ENV['ADMIN_PASSWORD']);

        $user->setPassword($password);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->text('Utilisateur importé correctement');

        return Command::SUCCESS;
    }
}