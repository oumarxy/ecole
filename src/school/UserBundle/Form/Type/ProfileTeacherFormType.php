<?php

namespace school\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileTeacherFormType extends AbstractType
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
            ->add('birthdate', 'datetime')
            ->add('placeOfBirth')
            ->add('address')
            ->add('registrationDate', 'datetime')
            ->add('gender')
            ->add('phone')
            ->add('userType');
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'school\UserBundle\Entity\Teacher'
        ));
    }
}
