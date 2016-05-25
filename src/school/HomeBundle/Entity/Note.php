<?php

namespace school\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="school\HomeBundle\Repository\NoteRepository")
 */
class Note
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
     * @ORM\Column(name="note_number", type="float")
     */
    private $noteNumber;

    /**
     * @ORM\ManyToOne(targetEntity="school\HomeBundle\Entity\Work", inversedBy="notes", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $work;

    /**
     * @ORM\ManyToOne(targetEntity="school\UserBundle\Entity\Student", inversedBy="notes", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noteNumber = 0;
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
     * Get noteNumber
     *
     * @return float
     */
    public function getNoteNumber()
    {
        return $this->noteNumber;
    }

    /**
     * Set noteNumber
     *
     * @param float $noteNumber
     *
     * @return Note
     */
    public function setNoteNumber($noteNumber)
    {
        $this->noteNumber = $noteNumber;

        return $this;
    }

    /**
     * Get work
     *
     * @return \school\HomeBundle\Entity\Work
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set work
     *
     * @param \school\HomeBundle\Entity\Work $work
     *
     * @return Note
     */
    public function setWork(\school\HomeBundle\Entity\Work $work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get student
     *
     * @return \school\UserBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set student
     *
     * @param \school\UserBundle\Entity\Student $student
     *
     * @return Note
     */
    public function setStudent(\school\UserBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }
}
