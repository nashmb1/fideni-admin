<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Share
 *
 * @ORM\Table(name="share")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\ShareRepository")
 */
class Share
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nominalValue", type="string", length=255)
     */
    private $nominalValue;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acquisitionDate", type="datetime")
     */
    private $acquisitionDate;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="blocked_until", type="datetime", nullable=true)
     */
    private $blockedUntil;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Fideni\CoreBundle\Entity\Subscription", inversedBy="shares")
     */
    private $subscription;


    /**
     * @ORM\ManyToOne(targetEntity="Fideni\CoreBundle\Entity\Cession", inversedBy="shares")
     */
    private $cession;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Share constructor.
     */
    public function __construct()
    {
        $this->acquisitionDate = new \DateTime('2015-05-01');
        $this->blockedUntil = new \DateTime('+ 5 years');
    }

    /**
     * Set nominalValue
     *
     * @param string $nominalValue
     * @return Share
     */
    public function setNominalValue($nominalValue)
    {
        $this->nominalValue = $nominalValue;

        return $this;
    }

    /**
     * Get nominalValue
     *
     * @return string 
     */
    public function getNominalValue()
    {
        return $this->nominalValue;
    }
    
    
    /**
     * Set acquisitionDate
     *
     * @param \DateTime $acquisitionDate
     * @return Share
     */
    public function setAcquisitionDate($acquisitionDate)
    {
        $this->acquisitionDate = $acquisitionDate;

        return $this;
    }

    /**
     * Get acquisitionDate
     *
     * @return \DateTime 
     */
    public function getAcquisitionDate()
    {
        return $this->acquisitionDate;
    }

    /**
     * @return \DateTime
     */
    public function getBlockedUntil()
    {
        return $this->blockedUntil;
    }

    /**
     * @param \DateTime $blockedUntil
     */
    public function setBlockedUntil($blockedUntil)
    {
        $this->blockedUntil = $blockedUntil;
    }


    /**
     * Set subscription
     *
     * @param \Fideni\CoreBundle\Entity\Subscription $subscription
     * @return Share
     */
    public function setSubscription(\Fideni\CoreBundle\Entity\Subscription $subscription = null)
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Get subscription
     *
     * @return \Fideni\CoreBundle\Entity\Subscription 
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    public function __toString()
    {
        return  'Actions n° '. $this->getId();
    }


    public function getPartner()
    {
        if($this->subscription instanceof Subscription) {
            $partner = $this->subscription->getUser();
            if($partner instanceof User){
                return $partner->__toString();
            }
        }

        return 'NC';
    }

    /**
     * @return mixed
     */
    public function getCession()
    {
        return $this->cession;
    }

    /**
     * @param mixed Cession $cession
     * @return $this
     */
    public function setCession(Cession $cession)
    {
        $this->cession = $cession;
        
        return $this;
    }
    
}
