<?php

namespace Fideni\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Fideni\UserBundle\Traits\AddressTrait;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Fideni\UserBundle\Repository\UserRepository")
 */
class User extends \FOS\UserBundle\Model\User
{
    
    use AddressTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=255, nullable=true)
     */
    protected $formation;

    /**
     * @ORM\OneToMany(targetEntity="Heir", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true )
     */
    protected $heirs;
    
    
    public function __construct()
    {
        parent::__construct();
        $this->heirs = new ArrayCollection();
    }

    /**
     * Set formation
     *
     * @param string $formation
     * @return User
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return string 
     */
    public function getFormation()
    {
        return $this->formation;
    }


    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @return \DateTime
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    
    /**
     * Add heirs
     *
     * @param \Fideni\UserBundle\Entity\Heir $heir
     * @return User
     */
    public function addHeir(\Fideni\UserBundle\Entity\Heir $heir)
    {
        if(!$this->heirs->contains($heir)){
            $this->heirs->add($heir);
            $heir->setUser($this);
        }

        return $this;
    }

    /**
     * Remove heirs
     *
     * @param \Fideni\UserBundle\Entity\Heir $heir
     */
    public function removeHeir(\Fideni\UserBundle\Entity\Heir $heir)
    {
//        dump($heir);die;
        $this->heirs->removeElement($heir);
    }

    /**
     * Get heirs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHeirs()
    {
        return $this->heirs;
    }
}
