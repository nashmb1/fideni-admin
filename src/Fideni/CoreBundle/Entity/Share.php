<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="nominalValue", type="string", length=255, unique=true)
     */
    private $nominalValue;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acquisitionDate", type="datetime")
     */
    private $acquisitionDate;

    /**
     * @var int
     *
     * @ORM\Column(name="campaignNumber", type="integer")
     */
    private $campaignNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;


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
     * Set price
     *
     * @param float $price
     * @return Share
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
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
     * Set campaignNumber
     *
     * @param integer $campaignNumber
     * @return Share
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
     * Set user
     *
     * @param string $user
     * @return Share
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }
}
