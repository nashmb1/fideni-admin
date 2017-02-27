<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Fideni\CoreBundle\Entity\Subscription;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSubscriptions extends AbstractFixture implements OrderedFixtureInterface
{
    

    public function getOrder()
    {
        return 6;
    }

    public function load(ObjectManager $manager)
    {
//        foreach (range(0, 19) as $i) {
//
//            $subscription = new Subscription();
////            $subscription->setCampaign('000' . ($i + 1));
//            $subscription->setNbShares($i + 1);
//            $subscription->setUser($this->getReference('user' . $i));
//            
//            $manager->persist($subscription);
//            $manager->flush();
//        }
    }
}
