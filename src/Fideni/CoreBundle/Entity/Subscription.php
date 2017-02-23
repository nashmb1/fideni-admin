<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fideni\UserBundle\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Subscription
 *
 * @ORM\Table(name="subscription")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\SubscriptionRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\ManyToOne(targetEntity="Fideni\UserBundle\Entity\User")
     * @Assert\NotBlank()
     */
    protected $user;


    /**
     * @ORM\ManyToOne(targetEntity="Fideni\CoreBundle\Entity\Campaign", cascade={"persist"})
     * @Assert\NotBlank()
     */
    protected $campaign;

    /**
     * @ORM\OneToMany(targetEntity="Fideni\CoreBundle\Entity\Share", mappedBy="subscription", cascade={"persist"})
     */
    protected $shares;


    /**
     * @ORM\Column(name="nb_shares", type="integer", nullable=false)
     */
    protected $nbShares;

    /**
     * @ORM\PrePersist()
     */
    public function addShares()
    {
        dump('in');
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

    /**
     * @return mixed
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param mixed $campaign
     * @return $this
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
        
        return $this;
    }
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shares = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add share
     *
     * @param \Fideni\CoreBundle\Entity\Share $share
     * @return Subscription
     */
    public function addShare(\Fideni\CoreBundle\Entity\Share $share)
    {
        if($share instanceof Share){
            $share->setNominalValue($share->getNominalValue() . '-' . ($this->shares->count() + 1) );
            $this->shares[] = $share;
            $share->setSubscription($this);

        }

        return $this;
    }

    /**
     * Remove share
     *
     * @param \Fideni\CoreBundle\Entity\Share $share
     */
    public function removeShare(\Fideni\CoreBundle\Entity\Share $share)
    {
        $this->shares->removeElement($share);
    }

    /**
     * Get shares
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShares()
    {
        return $this->shares;
    }

    /**
     * @return string
     */
    public function getPartner(){

        if($this->getUser() instanceof  User){
            return $this->getUser()->getName(). ' ' .$this->getUser()->getSurname();
        }

        return '';
    }

    public function getShareNumber()
    {

        return $this->shares->count();
    }

    public function getSharePrice()
    {

        if($this->getCampaign() instanceof  Campaign){
            return $this->getCampaign()->getSharePrice();
        }

        return 'NC';
    }

    /**
     * @return int|string
     */
    public function __toString()
    {
        if($this->campaign instanceof  Campaign){
            return 'Campagne ' . $this->campaign->__toString();
        }
        return ''. $this->id;
    }

    /**
     * @return mixed
     */
    public function getNbShares()
    {
        return $this->nbShares;
    }

    /**
     * @param mixed $nbShares
     * @return $this
     */
    public function setNbShares($nbShares)
    {
        $this->nbShares = $nbShares;
        
        return $this;
    }
    
    
}
