<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 19/02/17
 * Time: 22:03
 */

namespace Fideni\UserBundle\Command;


use Doctrine\ORM\EntityManager;
use Fideni\CoreBundle\Entity\Campaign;
use Fideni\CoreBundle\Entity\Subscription;
use Fideni\UserBundle\Entity\User;
use Liuggio\ExcelBundle\Factory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportUserCommand extends ContainerAwareCommand
{

    /**
     * @var string
     */
    private  $xlsFile;

    /**
     * @var Factory
     */
    private $phpExcel;

    /**
     * @var EntityManager
     */
    private $em;

    public function configure()
    {
        $this->setName('fideni:import:user');
    }

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->xlsFile = $this->getContainer()->getParameter('kernel.root_dir') . '/../var/import/Fiche Associés FIDENi-BDD.xlsx';
        $this->phpExcel = $this->getContainer()->get('phpexcel');
        $this->em = $this->getContainer()->get('doctrine')->getManager();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $phpObjectReader = \PHPExcel_IOFactory::createReader('Excel2007');
        $phpExcelObject = $phpObjectReader->load($this->xlsFile);

        $workSheet = $phpExcelObject->getSheet(0);
        $maxRow = $workSheet->getHighestRow();

        $encoder = $this->getContainer()->get('security.password_encoder');

        $campaign = new Campaign();
        $campaign->setEnabled(true);
        $campaign->setSharePrice(40);
        $campaign->setStartDate(new \DateTime('2015-04-01'));
        $campaign->setEndDate(new \DateTime('2015-09-30'));
        
        $this->em->persist($campaign);
        $this->em->flush();
        
        for($i = 3; $i < $maxRow; $i++){
            $name = $workSheet->getCell('C'.$i)->getValue();
            $surname = $workSheet->getCell('D'.$i)->getValue();
            $tel = $workSheet->getCell('E'.$i)->getValue();
            $job = $workSheet->getCell('G'.$i)->getValue();
            $company = $workSheet->getCell('H'.$i)->getValue();
            $email = $workSheet->getCell('I'.$i)->getValue();
            $formation = $workSheet->getCell('K'.$i)->getValue();
            $school = $workSheet->getCell('J'.$i)->getValue();
            $nationality = $workSheet->getCell('M'.$i)->getValue();
            $birthDay = $workSheet->getCell('N'.$i)->getValue();
            $street = $workSheet->getCell('O'.$i)->getValue();
            $country = $workSheet->getCell('P'.$i);
            $situationFamilial = $workSheet->getCell('V'.$i);
            
            if(!empty($email)){
                
                $user = $this->em->getRepository('FideniUserBundle:User')->findOneBy(['email' => $email]);
                if(!$user instanceof  User){
                    $user  = new User();
                }
                $user->setUsername($email);
                $user->setEmail($email);
                $user->setName($name);
                $user->setSurname($surname);
                $user->setTel1($tel);
                $user->setJob($job);
                $user->setJobInFideni('NR');
                $user->setCountry($country);
                $user->setStreet($street);
                $user->setFormation($formation);
                $user->setWorkPlace($company);
                $user->setSchool($school);
                $user->setNationality($nationality);
                $user->setFamilySituation($situationFamilial);
                $user->setBirthDate($this->getDate($birthDay));
                $user->setEnabled(false);
                $encodedPassword = $encoder->encodePassword($user, 'fideniPartnerAdmin45');
                $user->setPassword($encodedPassword);                
               
                $this->em->persist($user);
                $this->em->flush();

                $this->subscribe($user, $campaign);
            }
            
        }


    }

    /**
     * @param $xlsxDate
     * @return \DateTime
     */
    private function getDate($xlsxDate)
    {
        $stringDate =  date('Y-m-d', \PHPExcel_Shared_Date::ExcelToPHP($xlsxDate));
        
        return new \DateTime($stringDate);
    }

    /**
     * @param $user
     * @param $campaign
     */
    private function subscribe($user, $campaign)
    {
        $subscription = new Subscription();
        $subscription->setUser($user);
        $subscription->setNbShares(10);
        $subscription->setCampaign($campaign);
        
        $this->em->persist($subscription);
        $this->em->flush();
    }
}