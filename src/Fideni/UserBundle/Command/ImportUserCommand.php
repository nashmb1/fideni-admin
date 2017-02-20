<?php
/**
 * Created by PhpStorm.
 * User: nhmayaou
 * Date: 19/02/17
 * Time: 22:03
 */

namespace Fideni\UserBundle\Command;


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

    public function configure()
    {
        $this->setName('fideni:import:user');
    }

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->xlsFile = $this->getContainer()->getParameter('kernel.root_dir') . '/../var/import/Fiche Associés FIDENi-BDD.xlsx';
        $this->phpExcel = $this->getContainer()->get('phpexcel');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $phpObjectReader = \PHPExcel_IOFactory::createReader('Excel2007');
        $phpExcelObject = $phpObjectReader->load($this->xlsFile);

        $workSheet = $phpExcelObject->getSheet(0);
        $maxRow = $workSheet->getHighestRow();

        $encoder = $this->getContainer()->get('security.password_encoder');

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
                $user  = new User();
                $user->setUsername($email);
                $user->setEmail($email);
                $user->setName($name);
                $user->setSurname($surname);
                $user->setTel1($tel);
                $user->setJob($job);
                $user->setJobInFideni('NR');
                $user->setCountry($country);
                $user->setStreet($street);
                $user->setBirthDate($birthDay);
                $encodedPassword = $encoder->encodePassword($user, strtolower($name .$surname));
                $user->setPassword($encodedPassword);                
                $em = $this->getContainer()->get('doctrine')->getManager();
                $em->persist($user);
                $em->flush();
            }
            
        }


    }
}