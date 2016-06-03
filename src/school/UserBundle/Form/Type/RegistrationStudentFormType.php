<?php

namespace school\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//les uses ci-dessous pour nous permettre de recuperer les grades dans la bdd
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use school\HomeBundle\Form\ImageType;

class RegistrationStudentFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('middleName')
            ->add('lastName')
            ->add('firstName')
            ->add('birthdate', DateType::class, array('widget' => 'single_text', 'format' => 'd-MM-y', 'required' => false))
            ->add('placeOfBirth')
            ->add('address')
            ->add('city')
            ->add('province', ChoiceType::class, array(
                'choices' => array(
                    'Bas-Uele' => 'Bas-Uele',
                    'Équateur' => 'Équateur',
                    'Haut-Katanga' => 'Haut-Katanga',
                    'Haut-Lomami' => 'Haut-Lomami',
                    'Haut-Uele' => 'Haut-Uele',
                    'Ituri' => 'Ituri',
                    'Kasaï' => 'Kasaï',
                    'Kasaï-Central' => 'Kasaï-Central',
                    'Kasaï-Oriental' => 'Kasaï-Oriental',
                    'Kinshasa' => 'Kinshasa',
                    'Kongo-Central' => 'Kongo-Central',
                    'Kwango' => 'Kwango',
                    'Kwilu' => 'Kwilu',
                    'Lomami' => 'Lomami',
                    'Lualaba' => 'Lualaba',
                    'Mai-Ndombe' => 'Mai-Ndombe',
                    'Maniema' => 'Maniema',
                    'Mongala' => 'Mongala',
                    'Nord-Kivu' => 'Nord-Kivu',
                    'Nord-Ubangi' => 'Nord-Ubangi',
                    'Sankuru' => 'Sankuru',
                    'Sud-Kivu' => 'Sud-Kivu',
                    'Sud-Ubangi' => 'Sud-Ubangi',
                    'Tanganyika' => 'Tanganyika',
                    'Tshopo' => 'Tshopo',
                    'Tshuapa' => 'Tshuapa',
                ),

                // *this line is important*
                'choices_as_values' => true,
                'placeholder' => '-- Sélectionner Province --',
                'required' => true,
            ))
            ->add('gender', ChoiceType::class, array(
                'choices' => array(
                    'Masculin' => 'M',
                    'Feminin' => 'F'
                ),

                // *this line is important*
                'choices_as_values' => true,
                'placeholder' => '-- Sélectionner Sexe --',
                'required' => true,
            ))
            ->add('phone')
            ->add('image', new ImageType(), array('required' => false))
            //On recupere les grades dans la bdd
            ->add('grade', EntityType::class, array(
                'class' => 'schoolHomeBundle:Grade',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.id', 'ASC');
                },
                'property' => 'grade_name',
                'multiple' => false,
                'expanded' => false,
                'placeholder' => '-- Sélectionner la classe --',
                'required' => true,
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'school\UserBundle\Entity\Student'
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
}
