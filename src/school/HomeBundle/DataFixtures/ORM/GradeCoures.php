<?php

// src/school/HomeBundle/DataFixtures/ORM/GradeCourses.php

namespace school\HomeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use school\HomeBundle\Entity\Grade;
use school\HomeBundle\Entity\Course;

class GradeCourses implements FixtureInterface
{

    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        $grade = new Grade();
        $grade->setGradeName("Premiere primaire");
        $manager->persist($grade);
        $manager->flush();

        // Liste des cours à ajouter
        $courses = array('Francais', 'Mathematiques', 'Histoire', 'Geographie', 'Dessin', 'Musique');

        foreach ($courses as $i => $course) {
            // On crée la catégorie
            $liste_courses[$i] = new Course();
            $liste_courses[$i]->setCourseName($course);
            $liste_courses[$i]->setGrade($grade);

            // On la persiste
            $manager->persist($liste_courses[$i]);
            $manager->flush();
        }

        //DEUXIEME PRIMAIRE
        $grade = new Grade();
        $grade->setGradeName("Deuxieme primaire");
        $manager->persist($grade);
        $manager->flush();

        // Liste des cours à ajouter
        $courses = array('Francais 2', 'Mathematiques', 'Histoire', 'Geographie', 'Dessin', 'Musique');

        foreach ($courses as $i => $course) {
            // On crée la catégorie
            $liste_courses[$i] = new Course();
            $liste_courses[$i]->setCourseName($course);
            $liste_courses[$i]->setGrade($grade);

            // On la persiste
            $manager->persist($liste_courses[$i]);
            $manager->flush();
        }

        //TROISIEME PRIMAIRE
        $grade = new Grade();
        $grade->setGradeName("Troisieme primaire");
        $manager->persist($grade);
        $manager->flush();

        // Liste des cours à ajouter
        $courses = array('Francais 3', 'Mathematiques', 'Histoire', 'Geographie', 'Dessin', 'Musique');

        foreach ($courses as $i => $course) {
            // On crée la catégorie
            $liste_courses[$i] = new Course();
            $liste_courses[$i]->setCourseName($course);
            $liste_courses[$i]->setGrade($grade);

            // On la persiste
            $manager->persist($liste_courses[$i]);
            $manager->flush();
        }
    }

}
