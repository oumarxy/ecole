<?php

namespace school\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Grade
 *
 * @ORM\Table(name="grade")
 * @ORM\Entity(repositoryClass="school\HomeBundle\Repository\GradeRepository")
 */
class Grade
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
     * @ORM\Column(name="grade_name", type="string", length=255)
     */
    private $gradeName;

    /**
     * @ORM\OneToMany(targetEntity="school\HomeBundle\Entity\Course", mappedBy="grade")
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity="school\UserBundle\Entity\Student", mappedBy="grade")
     */
    private $students;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get gradeName
     *
     * @return string
     */
    public function getGradeName()
    {
        return $this->gradeName;
    }

    /**
     * Set gradeName
     *
     * @param string $gradeName
     *
     * @return Grade
     */
    public function setGradeName($gradeName)
    {
        $this->gradeName = $gradeName;

        return $this;
    }

    /**
     * Add course
     *
     * @param \school\HomeBundle\Entity\Course $course
     *
     * @return Grade
     */
    public function addCourse(\school\HomeBundle\Entity\Course $course)
    {
        $this->courses[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \school\HomeBundle\Entity\Course $course
     */
    public function removeCourse(\school\HomeBundle\Entity\Course $course)
    {
        $this->courses->removeElement($course);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add student
     *
     * @param \school\UserBundle\Entity\Student $student
     *
     * @return Grade
     */
    public function addStudent(\school\UserBundle\Entity\Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \school\UserBundle\Entity\Student $student
     */
    public function removeStudent(\school\UserBundle\Entity\Student $student)
    {
        $this->students->removeElement($student);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudents()
    {
        return $this->students;
    }
}
