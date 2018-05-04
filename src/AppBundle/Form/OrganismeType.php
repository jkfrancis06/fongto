<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use AppBundle\Form\DomaineType;
use AppBundle\Form\DirecteurType;
use AppBundle\Form\PresidentType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OrganismeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sigle')
            ->add('nom')
//            ->add('dateCreation')
            ->add('lieuCreation')
            ->add('numeroEnr')
//            ->add('dateEnr')
            ->add('villeEnr')
            ->add('paysEnr')
            ->add('missionOrg',TextareaType::class)
            ->add('objectifOrg',TextareaType::class)
            ->add('adresseOrg', TextareaType::class)
            ->add('domaine',DomaineType::class)
            ->add('president',PresidentType::class)
            ->add('directeur',DirecteurType::class  )
//            ->add('anneeAdh')
            ->add('numAdh')
            ->add('logo',VichImageType::class, array('required' => false))
            ->add('Ajouter', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Organisme'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_organisme';
    }


}
