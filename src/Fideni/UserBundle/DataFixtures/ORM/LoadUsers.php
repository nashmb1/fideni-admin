<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadUsers extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;


    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ContainerInterface|null $container
     */
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

            $user->setName('Nomao'. $i);
            $user->setSurname('Ozari '. $i);
//            $user->setPhotoFile($this->getImage());

            $user->setTel1('+33 88 99 55 44 4'.$i);
            $user->setLastLogin(new \DateTime());

            $plainPassword = 'password'.$i;
            $encodedPassword = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encodedPassword);

            $this->addReference('user-'.$i, $user);
            $manager->persist($user);

            $this->addReference('user'.$i, $user);
        }

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@fideni.com');
        $user->setRoles(array('ROLE_ADMIN'));
        $user->setName('Boss');
        $user->setSurname('Imprevu');
//        $user->setPhotoFile($this->getImage());
        $user->setEnabled(true);
        $user->setPassword($encoder->encodePassword($user, 'admin002'));
        $manager->persist($user);
        $manager->flush();
    }

    /**
     * @return UploadedFile
     */
    private function getImage()
    {
        $rootDir = $this->container->getParameter('kernel.root_dir');

        $fileSystem = new Filesystem();
        $fileSystem->copy($rootDir. '/../web/bundles/fidenicore/img/nass_tof.JPG', $rootDir. '/../web/bundles/fidenicore/img/nass1_tof.JPG');
        return new UploadedFile($rootDir. '/../web/bundles/fidenicore/img/nass1_tof.JPG','nass_tof.JPG', null, null, null, true);
        
    }
}
