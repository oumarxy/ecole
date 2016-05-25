<?php

namespace school\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="school\HomeBundle\Repository\CourseRepository")
 */
class Course
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
     * @ORM\Column(name="course_name", type="string", length=255)
     */
    private $courseName;

    /**
     * @ORM\ManyToOne(targetEntity="school\UserBundle\Entity\Teacher", inversedBy="courses", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $teacher;

    /**
     * @ORM\ManyToOne(targetEntity="school\HomeBundle\Entity\Grade", inversedBy="courses", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $grade;

    /**
     * @ORM\OneToMany(targetEntity="school\HomeBundle\Entity\Work", mappedBy="course")
     */
    private $works;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->works = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get courseName
     *
     * @return string
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * Set courseName
     *
     * @param string $courseName
     *
     * @return Course
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \school\UserBundle\Entity\Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set teacher
     *
     * @param \school\UserBundle\Entity\Teacher $teacher
     *
     * @return Course
     */
    public function setTeacher(\school\UserBundle\Entity\Teacher $teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get grade
     *
     * @return \school\HomeBundle\Entity\Grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set grade
     *
     * @param \school\HomeBundle\Entity\Grade $grade
     *
     * @return Course
     */
    public function setGrade(\school\HomeBundle\Entity\Grade $grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Add work
     *
     * @param \school\HomeBundle\Entity\Work $work
     *
     * @return Course
     */
    public function addWork(\school\HomeBundle\Entity\Work $work)
    {
        $this->works[] = $work;

        return $this;
    }

    /**
     * Remove work
     *
     * @param \school\HomeBundle\Entity\Work $work
     */
    public function removeWork(\school\HomeBundle\Entity\Work $work)
    {
        $this->works->removeElement($work);
    }

    /**
     * Get works
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorks()
    {
        return $this->works;
    }
}
