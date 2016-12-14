<?php

namespace Fideni\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fideni\UserBundle\Traits\AddressTrait;

/**
 * Heir
 *
 * @ORM\Table(name="heir")
 * @ORM\Entity(repositoryClass="Fideni\UserBundle\Repository\HeirRepository")
 */
class Heir
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
     * @ORM\ManyToOne(targetEntity="Fideni\UserBundle\Entity\User", inversedBy="heirs")
     */
    protected $user;
    

    /**
     * Set user
     *
     * @param \Fideni\UserBundle\Entity\User $user
     * @return Heir
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
