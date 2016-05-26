<?php

namespace school\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="teacher")
 * @UniqueEntity(fields = "username", targetClass = "school\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "school\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Teacher extends User
{
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
     * @ORM\Column(name="middle_name", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="place_of_birth", type="string", length=255, nullable=true)
     */
    private $placeOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le nom de la ville ne doit pas avoir moins de {{ limit }} caractères",
     *      maxMessage = "Le nom de la ville ne doit pas avoir plus de {{ limit }} caractères"
     * )
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="province", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le nom de la province ne doit pas avoir moins de {{ limit }} caractères",
     *      maxMessage = "Le nom de la province ne doit pas avoir plus de {{ limit }} caractères"
     * )
     */
    private $province;

    /**
     * @ORM\OneToOne(targetEntity="school\HomeBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="datetime")
     */
    private $registrationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=255)
     */
    private $userType;

    /**
     * @ORM\OneToMany(targetEntity="school\HomeBundle\Entity\Course", mappedBy="teacher")
     */
    private $courses;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->birthdate = new \DateTime();
        $this->registrationDate = new \DateTime();
        $this->courses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userType = "Teacher";
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     *
     * @return Teacher
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Teacher
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Teacher
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return Teacher
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get placeOfBirth
     *
     * @return string
     */
    public function getPlaceOfBirth()
    {
        return $this->placeOfBirth;
    }

    /**
     * Set placeOfBirth
     *
     * @param string $placeOfBirth
     *
     * @return Teacher
     */
    public function setPlaceOfBirth($placeOfBirth)
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Teacher
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Set city
     *
     * @param string $city
     *
     * @return Teacher
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Teacher
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get registrationDate
     *
     * @return \DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * Set registrationDate
     *
     * @param \DateTime $registrationDate
     *
     * @return Teacher
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Teacher
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Teacher
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return Teacher
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get image
     *
     * @return \school\HomeBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param \school\HomeBundle\Entity\Image $image
     *
     * @return Teacher
     */
    public function setImage(\school\HomeBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Add course
     *
     * @param \school\HomeBundle\Entity\Course $course
     *
     * @return Teacher
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
}
