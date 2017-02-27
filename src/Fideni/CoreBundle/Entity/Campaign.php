<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\CampaignRepository")
 */
class Campaign
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="blocked_until", type="date", nullable=true)
     */
    private $blockedUntil;

    /**
     * @var float
     *
     * @ORM\Column(name="sharePrice", type="float")
     */
    private $sharePrice;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;


    /**
     * 
     */
    public function __constructor()
    {
        $this->blockedUntil = new \DateTime('+ 5 years');
    }

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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Campaign
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Campaign
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set sharePrice
     *
     * @param float $sharePrice
     * @return Campaign
     */
    public function setSharePrice($sharePrice)
    {
        $this->sharePrice = $sharePrice;

        return $this;
    }

    /**
     * Get sharePrice
     *
     * @return float 
     */
    public function getSharePrice()
    {
        return $this->sharePrice;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param $enabled
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
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
     * @return string
     */
    public function __toString()
    {
        return 'N° '. $this->id .'---' . $this->startDate->format('Y-m-d') .  '/' . $this->endDate->format('Y-m-d');
    }
}
