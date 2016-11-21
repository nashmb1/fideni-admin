<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\SubscriptionRepository")
 */
class Subscription
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
     * @var int
     *
     * @ORM\Column(name="campaignNumber", type="integer")
     */
    private $campaignNumber;

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
     * @var string
     *
     * @ORM\Column(name="sharePrice", type="string", length=255)
     */
    private $sharePrice;

    /**
     * @var int
     *
     * @ORM\Column(name="ShareNumber", type="integer")
     */
    private $shareNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Fideni\UserBundle\Entity\User")
     */
    protected $user;


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
     * Set campaignNumber
     *
     * @param integer $campaignNumber
     * @return Subscription
     */
    public function setCampaignNumber($campaignNumber)
    {
        $this->campaignNumber = $campaignNumber;

        return $this;
    }

    /**
     * Get campaignNumber
     *
     * @return integer 
     */
    public function getCampaignNumber()
    {
        return $this->campaignNumber;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Subscription
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
     * @return Subscription
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
     * @param string $sharePrice
     * @return Subscription
     */
    public function setSharePrice($sharePrice)
    {
        $this->sharePrice = $sharePrice;

        return $this;
    }

    /**
     * Get sharePrice
     *
     * @return string 
     */
    public function getSharePrice()
    {
        return $this->sharePrice;
    }

    /**
     * Set shareNumber
     *
     * @param integer $shareNumber
     * @return Subscription
     */
    public function setShareNumber($shareNumber)
    {
        $this->shareNumber = $shareNumber;

        return $this;
    }

    /**
     * Get shareNumber
     *
     * @return integer 
     */
    public function getShareNumber()
    {
        return $this->shareNumber;
    }

    /**
     * Set user
     *
     * @param \Fideni\UserBundle\Entity\User $user
     * @return Subscription
     */
    public function setUser(\Fideni\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Fideni\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}