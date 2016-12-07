<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Fideni\CoreBundle\Entity\Project;
use Fideni\CoreBundle\Entity\Subscription;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProjects extends AbstractFixture implements OrderedFixtureInterface
{
    

    public function getOrder()
    {
        return 3;
    }

    public function load(ObjectManager $manager)
    {
        foreach (range(0, 19) as $i) {

            $project = new Project();
            $project->setLegalForm('Sas SAS');
            $project->setCompagnyAsset('30 M euro');
            $project->setFideniShare('30%');
            $project->setCountry('Niger');
            $project->setNumberOfPartner($i);
            $project->setCity('Doutchi');
            $project->setLeader('Tanimoum Nomao');
            $project->setFounded($i%2 == 0);
            
            $manager->persist($project);
            $manager->flush();
        }
    }
}
