<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{

    /**
     *@var Generator
     */

    private Generator $faker;
    public function __construct()
    {
    $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
         $users = [];

         $admin = new Users();
         $admin->setNom('titi')
                 ->setPrenom('toto')
                 ->setEmail('admin@mail.com')
                 ->setTelephonePortable('0658583359')
                 ->setAdresse('09 Rue Chantal Sandrin')
                 ->setVille('Lyon')
                 ->setCodePostale('69008')
                 ->setRoles(['ROLE_ADMIN'])
                 ->setPassword('password')
                 ->setPlainPassword('password');
                   $users[] = $admin;
                   $manager->persist($admin);

         for ($i = 0; $i < 10 ; $i++) {
            $user = new Users();
            $user-> setNom($this->faker->lastName())
                 ->setPrenom($this->faker->firstName())
                 ->setEmail($this->faker->email())
                 ->setTelephonePortable($this->faker->e164PhoneNumber())
                 ->setAdresse($this->faker->address())
                 ->setVille($this->faker->city())
                 ->setCodePostale($this->faker->postcode())
                 ->setRoles(['ROLE_USER'])
                 ->setPassword('password')
                 ->setPlainPassword('password');
                 $users[] = $user;
                   $manager->persist($user);
         }
       

        $manager->flush();
    }
}
