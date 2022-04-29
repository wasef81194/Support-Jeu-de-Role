<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    
      
        private $encoder;
    
        public function __construct(UserPasswordEncoderInterface $encoder)
        {
            $this->encoder = $encoder;
        }
       public function load(ObjectManager $manager)
       {
            $faker = Factory::create('fr_FR');

            
            for($i = 1 ; $i <=30 ; $i++){

                $value = $faker->email();

                $user = new User();
                $password = $this->encoder->encodePassword($user, $value);
                $user->setEmail($value)
                ->setPassword($password)
                ->setPseudo($faker->lastName());

                $manager->persist($user);

                
                

               
        }$manager->flush();

}
}