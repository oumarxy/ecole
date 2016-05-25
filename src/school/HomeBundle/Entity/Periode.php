<?php

namespace school\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Periode
 *
 * @ORM\Table(name="periode")
 * @ORM\Entity(repositoryClass="school\HomeBundle\Repository\PeriodeRepository")
 */
class Periode
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
     * @ORM\Column(name="periode_name", type="string", length=255)
     */
    private $periodeName;

    /**
     * @ORM\OneToMany(targetEntity="school\HomeBundle\Entity\Work", mappedBy="periode")
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
     * Get periodeName
     *
     * @return string
     */
    public function getPeriodeName()
    {
        return $this->periodeName;
    }

    /**
     * Set periodeName
     *
     * @param string $periodeName
     *
     * @return Periode
     */
    public function setPeriodeName($periodeName)
    {
        $this->periodeName = $periodeName;

        return $this;
    }

    /**
     * Add work
     *
     * @param \school\HomeBundle\Entity\Work $work
     *
     * @return Periode
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
