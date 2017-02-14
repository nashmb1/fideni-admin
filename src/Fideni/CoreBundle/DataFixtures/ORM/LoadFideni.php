<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Fideni\CoreBundle\Entity\Fideni;
use Fideni\CoreBundle\Entity\Project;
use Fideni\CoreBundle\Entity\Subscription;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFideni extends AbstractFixture implements OrderedFixtureInterface
{
    

    public function getOrder()
    {
        return 10;
    }

    public function load(ObjectManager $manager)
    {
            $object = new Fideni();

            $object->setCapital(2000000);
            $object->setAssetAvailable(5000000);
            $object->setAssetInBank(6000000);
            $object->setInvestedAmount(8000000);
            $object->setNumberOfPartners(200);
            $object->setSharePrice(30000);
            $object->setNumberOfProjets(10);
            $object->setNumberOfShares(4000);
            $object->setNumberOfSoldShares(3000);
            
            $manager->persist($object);
            $manager->flush();
    }
}
