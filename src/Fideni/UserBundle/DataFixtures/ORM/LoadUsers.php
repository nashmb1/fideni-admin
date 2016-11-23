<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUsers extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function getOrder()
    {
        return 10;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $encoder = $this->container->get('security.password_encoder');

        foreach (range(0, 19) as $i) {
            $user = new User();
            $user->setUsername('user'.$i);
            $user->setEmail('user'.$i.'@example.com');
            $user->setRoles(array('ROLE_USER'));
            $user->setEnabled(true);

            $user->setName('Partner'. $i);
            $user->setSurname('Partner Father '. $i); 
            $user->setTel1('+33 88 99 55 44 44');
            $user->setLastLogin(new \DateTime());

            $plainPassword = 'password'.$i;
            $encodedPassword = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encodedPassword);

            $this->addReference('user-'.$i, $user);
            $manager->persist($user);
        }

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@fideni.com');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setEnabled(true);
        $user->setPassword($encoder->encodePassword($user, 'admin'));
        $manager->persist($user);
        $manager->flush();
    }
}
