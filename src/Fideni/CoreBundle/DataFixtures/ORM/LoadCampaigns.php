<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Faker\Provider\tr_TR\DateTime;
use Fideni\CoreBundle\Entity\Campaign;
use Fideni\CoreBundle\Entity\Project;
use Fideni\CoreBundle\Entity\Subscription;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCampaigns extends AbstractFixture implements OrderedFixtureInterface
{
    

    public function getOrder()
    {
        return 4;
    }

    public function load(ObjectManager $manager)
    {
        foreach (range(0, 6) as $i) {
            $campaign  = new Campaign();
            $campaign->setEnabled(false);
            $campaign->setStartDate(new \DateTime());
            $campaign->setEndDate(new \DateTime());
            $campaign->setEnabled(false);
            if($i == 6){
                $campaign->setEnabled(true);
            }
            $campaign->setSharePrice(40 + $i);

            
            $manager->persist($campaign);
            $manager->flush();
        }
    }
}
