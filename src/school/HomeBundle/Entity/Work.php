<?php

namespace school\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Work
 *
 * @ORM\Table(name="work")
 * @ORM\Entity(repositoryClass="school\HomeBundle\Repository\WorkRepository")
 */
class Work
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
     * @ORM\Column(name="work_name", type="string", length=255)
     */
    private $workName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="school\HomeBundle\Entity\Course", inversedBy="works", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $course;

    /**
     * @ORM\ManyToOne(targetEntity="school\HomeBundle\Entity\Periode", inversedBy="works", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $periode;

    /**
     * @ORM\OneToMany(targetEntity="school\HomeBundle\Entity\Note", mappedBy="student")
     */
    private $notes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get workName
     *
     * @return string
     */
    public function getWorkName()
    {
        return $this->workName;
    }

    /**
     * Set workName
     *
     * @param string $workName
     *
     * @return Work
     */
    public function setWorkName($workName)
    {
        $this->workName = $workName;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Work
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get course
     *
     * @return \school\HomeBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set course
     *
     * @param \school\HomeBundle\Entity\Course $course
     *
     * @return Work
     */
    public function setCourse(\school\HomeBundle\Entity\Course $course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get periode
     *
     * @return \school\HomeBundle\Entity\Periode
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set periode
     *
     * @param \school\HomeBundle\Entity\Periode $periode
     *
     * @return Work
     */
    public function setPeriode(\school\HomeBundle\Entity\Periode $periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Add note
     *
     * @param \school\HomeBundle\Entity\Note $note
     *
     * @return Work
     */
    public function addNote(\school\HomeBundle\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove note
     *
     * @param \school\HomeBundle\Entity\Note $note
     */
    public function removeNote(\school\HomeBundle\Entity\Note $note)
    {
        $this->notes->removeElement($note);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
