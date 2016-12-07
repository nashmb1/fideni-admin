<?php

namespace Fideni\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="Fideni\CoreBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(name="legalForm", type="string", length=255, nullable=true)
     */
    private $legalForm;

    /**
     * @var string
     *
     * @ORM\Column(name="compagnyAsset", type="string", length=255, nullable=true)
     */
    private $compagnyAsset;

    /**
     * @var string
     *
     * @ORM\Column(name="fideniShare", type="string", length=255, nullable=true)
     */
    private $fideniShare;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfPartner", type="integer",  nullable=true)
     */
    private $numberOfPartner;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="leader", type="string", length=255)
     */
    private $leader;


    /**
     * @var string
     *
     * @ORM\Column(name="founded", type="boolean")
     */
    private $founded = false;


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
     * Set legalForm
     *
     * @param string $legalForm
     * @return Project
     */
    public function setLegalForm($legalForm)
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Get legalForm
     *
     * @return string 
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * Set compagnyAsset
     *
     * @param string $compagnyAsset
     * @return Project
     */
    public function setCompagnyAsset($compagnyAsset)
    {
        $this->compagnyAsset = $compagnyAsset;

        return $this;
    }

    /**
     * Get compagnyAsset
     *
     * @return string 
     */
    public function getCompagnyAsset()
    {
        return $this->compagnyAsset;
    }

    /**
     * Set fideniShare
     *
     * @param string $fideniShare
     * @return Project
     */
    public function setFideniShare($fideniShare)
    {
        $this->fideniShare = $fideniShare;

        return $this;
    }

    /**
     * Get fideniShare
     *
     * @return string 
     */
    public function getFideniShare()
    {
        return $this->fideniShare;
    }

    /**
     * Set numberOfPartner
     *
     * @param integer $numberOfPartner
     * @return Project
     */
    public function setNumberOfPartner($numberOfPartner)
    {
        $this->numberOfPartner = $numberOfPartner;

        return $this;
    }

    /**
     * Get numberOfPartner
     *
     * @return integer 
     */
    public function getNumberOfPartner()
    {
        return $this->numberOfPartner;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Project
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Project
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Project
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Project
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set leader
     *
     * @param string $leader
     * @return Project
     */
    public function setLeader($leader)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return string 
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * @return string
     */
    public function getFounded()
    {
        return $this->founded;
    }

    /**
     * @param $founded
     * @return $this
     */
    public function setFounded($founded)
    {
        $this->founded = $founded;

        return $this;
    }


}
