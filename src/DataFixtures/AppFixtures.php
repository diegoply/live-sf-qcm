<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface) {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@site.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,'password'));
        $manager->persist($user);

        $user = new User();
        $user->setEmail('formateur1@site.com');
        $user->setRoles(['ROLE_FORMATEUR']);
        $user->setPassword($this->userPasswordHasherInterface->hashPassword($user,'password'));
        $manager->persist($user);

        $manager->flush();
    }
}
