<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fideni
 *
 * @ORM\Table(name="fideni")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\FideniRepository")
 */
class Fideni
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
     * @var float
     *
     * @ORM\Column(name="capital", type="float", nullable=true)
     */
    private $capital;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfPartners", type="integer", nullable=true)
     */
    private $numberOfPartners;

    /**
     * @var float
     *
     * @ORM\Column(name="sharePrice", type="float", nullable=true)
     */
    private $sharePrice;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfShares", type="integer", nullable=true)
     */
    private $numberOfShares;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfSoldShares", type="integer", nullable=true)
     */
    private $numberOfSoldShares;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfProjets", type="integer", nullable=true)
     */
    private $numberOfProjets;

    /**
     * @var float
     *
     * @ORM\Column(name="InvestedAmount", type="float", nullable=true)
     */
    private $investedAmount;

    /**
     * @var int
     *
     * @ORM\Column(name="AssetInBank", type="integer", nullable=true)
     */
    private $assetInBank;

    /**
     * @var float
     *
     * @ORM\Column(name="AssetAvailable", type="float", nullable=true)
     */
    private $assetAvailable;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set capital
     *
     * @param float $capital
     *
     * @return Fideni
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return float
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set numberOfPartners
     *
     * @param integer $numberOfPartners
     *
     * @return Fideni
     */
    public function setNumberOfPartners($numberOfPartners)
    {
        $this->numberOfPartners = $numberOfPartners;

        return $this;
    }

    /**
     * Get numberOfPartners
     *
     * @return int
     */
    public function getNumberOfPartners()
    {
        return $this->numberOfPartners;
    }

    /**
     * Set sharePrice
     *
     * @param float $sharePrice
     *
     * @return Fideni
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
     * Set numberOfShares
     *
     * @param integer $numberOfShares
     *
     * @return Fideni
     */
    public function setNumberOfShares($numberOfShares)
    {
        $this->numberOfShares = $numberOfShares;

        return $this;
    }

    /**
     * Get numberOfShares
     *
     * @return int
     */
    public function getNumberOfShares()
    {
        return $this->numberOfShares;
    }

    /**
     * Set numberOfSoldShares
     *
     * @param integer $numberOfSoldShares
     *
     * @return Fideni
     */
    public function setNumberOfSoldShares($numberOfSoldShares)
    {
        $this->numberOfSoldShares = $numberOfSoldShares;

        return $this;
    }

    /**
     * Get numberOfSoldShares
     *
     * @return int
     */
    public function getNumberOfSoldShares()
    {
        return $this->numberOfSoldShares;
    }

    /**
     * Set numberOfProjets
     *
     * @param integer $numberOfProjets
     *
     * @return Fideni
     */
    public function setNumberOfProjets($numberOfProjets)
    {
        $this->numberOfProjets = $numberOfProjets;

        return $this;
    }

    /**
     * Get numberOfProjets
     *
     * @return int
     */
    public function getNumberOfProjets()
    {
        return $this->numberOfProjets;
    }

    /**
     * Set investedAmount
     *
     * @param float $investedAmount
     *
     * @return Fideni
     */
    public function setInvestedAmount($investedAmount)
    {
        $this->investedAmount = $investedAmount;

        return $this;
    }

    /**
     * Get investedAmount
     *
     * @return float
     */
    public function getInvestedAmount()
    {
        return $this->investedAmount;
    }

    /**
     * Set assetInBank
     *
     * @param integer $assetInBank
     *
     * @return Fideni
     */
    public function setAssetInBank($assetInBank)
    {
        $this->assetInBank = $assetInBank;

        return $this;
    }

    /**
     * Get assetInBank
     *
     * @return int
     */
    public function getAssetInBank()
    {
        return $this->assetInBank;
    }

    /**
     * Set assetAvailable
     *
     * @param float $assetAvailable
     *
     * @return Fideni
     */
    public function setAssetAvailable($assetAvailable)
    {
        $this->assetAvailable = $assetAvailable;

        return $this;
    }

    /**
     * Get assetAvailable
     *
     * @return float
     */
    public function getAssetAvailable()
    {
        return $this->assetAvailable;
    }
}

