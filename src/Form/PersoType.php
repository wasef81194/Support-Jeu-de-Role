<?php

namespace App\Form;

use App\Entity\AttributAmeliores;
use App\Entity\Personnage;
use App\Entity\Classe;
use Doctrine\DBAL\Types\ArrayType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class PersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                'attr' => ['placeholder' => 'Votre Nom'],
                'label' => false
            ])
            // ************Attribut de basse***********
            ->add('coeur', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('corps', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('esprit', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            //************************************ */
            //*****************************Competence***************** */
            ->add('Admiration', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Athletisme', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Conscience', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Exploration', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Chant', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Inspiration', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Voyage', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Perspicacite', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Guerison', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Courtoisie', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Combat', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Furtivite', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Fouille', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Chasse', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Enigmes', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('Conaissances', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            //************************************************* */
            ->add('espoir', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('endurance', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('vaillance', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ->add('sagesse', IntegerType::class, [
                'attr' => ['class' => 'form-control-sm col-2'],
            ])
            ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
