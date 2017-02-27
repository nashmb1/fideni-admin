<?php

namespace Fideni\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Fideni\UserBundle\Traits\AddressTrait;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Fideni\UserBundle\Repository\UserRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $photo;

    /**
     * @var File
     * @Vich\UploadableField(mapping="user_image", fileNameProperty="photo")
     */
    protected $photoFile;

    /**
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=255, nullable=true)
     */
    protected $formation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="experience", type="string", nullable=true)
     */
    protected $experience;
    
  /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", nullable=true)
     */
    protected $job;

    /**
     * @var string
     *
     * @ORM\Column(name="school", type="string", nullable=true)
     */
    protected $school;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", nullable=true)
     */
    protected $nationality;

    /**
     * @var string
     *
     * @ORM\Column(name="family_situation", type="string", nullable=true)
     */
    protected $familySituation;
    
    /**
     * @var string
     *
     * @ORM\Column(name="job_in_fideni", type="string", nullable=true)
     */
    protected $jobInFideni;

    /**
     * @var string
     *
     * @ORM\Column(name="work_place", type="string", nullable=true)
     */
    private $workPlace;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Heir", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true )
     */
    protected $heirs;

    /**
     * @ORM\Column("created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column("updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->heirs = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
    }

    /**
     * @param File|null $image
     * @return $this
     */
    public function setPhotoFile(File $image = null)
    {
        $this->photoFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    
    /**
     * @return File
     */
    public function getPhotoFile()
    {
        return $this->photoFile;
    }


    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
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

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param string $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return mixed
     */
    public function getJobInFideni()
    {
        return $this->jobInFideni;
    }

    /**
     * @param mixed $jobInFideni
     */
    public function setJobInFideni($jobInFideni)
    {
        $this->jobInFideni = $jobInFideni;
    }

    

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name . ' ' . $this->surname;
    }

    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @param string $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getFamilySituation()
    {
        return $this->familySituation;
    }

    /**
     * @param string $familySituation
     */
    public function setFamilySituation($familySituation)
    {
        $this->familySituation = $familySituation;
    }

    /**
     * @return string
     */
    public function getWorkPlace()
    {
        return $this->workPlace;
    }

    /**
     * @param string $workPlace
     */
    public function setWorkPlace($workPlace)
    {
        $this->workPlace = $workPlace;
    }
    
    
}
