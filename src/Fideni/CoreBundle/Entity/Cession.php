<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cession
 *
 * @ORM\Table(name="cession")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\CessionRepository")
 */
class Cession
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
     * @ORM\Column(name="sellingPrice", type="float")
     */
    private $sellingPrice;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Fideni\UserBundle\Entity\User")
     */
    private $buyer;

    /**
     * @ORM\OneToOne(targetEntity="Fideni\UserBundle\Entity\User")
     */    
    private $seller;

    /**
     * @ORM\ManyToOne(targetEntity="Fideni\CoreBundle\Entity\Share")
     */
    private $shares;
    

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
     * Set sellingPrice
     *
     * @param float $sellingPrice
     *
     * @return Cession
     */
    public function setSellingPrice($sellingPrice)
    {
        $this->sellingPrice = $sellingPrice;

        return $this;
    }

    /**
     * Get sellingPrice
     *
     * @return float
     */
    public function getSellingPrice()
    {
        return $this->sellingPrice;
    }
    

    /**
     * Set buyer
     *
     * @param \Fideni\UserBundle\Entity\User $buyer
     *
     * @return Cession
     */
    public function setBuyer(\Fideni\UserBundle\Entity\User $buyer = null)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get buyer
     *
     * @return \Fideni\UserBundle\Entity\User
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set seller
     *
     * @param \Fideni\UserBundle\Entity\User $seller
     *
     * @return Cession
     */
    public function setSeller(\Fideni\UserBundle\Entity\User $seller = null)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Get seller
     *
     * @return \Fideni\UserBundle\Entity\User
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Set shares
     *
     * @param \Fideni\CoreBundle\Entity\Share $shares
     *
     * @return Cession
     */
    public function setShares(\Fideni\CoreBundle\Entity\Share $shares = null)
    {
        $this->shares = $shares;

        return $this;
    }

    /**
     * Get shares
     *
     * @return \Fideni\CoreBundle\Entity\Share
     */
    public function getShares()
    {
        return $this->shares;
    }
}
