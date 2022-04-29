<?php

namespace App\Form;
use App\Entity\Armes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ArmesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        ->add('arme',TextType::class, [
            'attr' => ['placeholder' => 'Armes'],
            'label' => false,
            
        ])
        ->add('competence',IntegerType::class, [
            'attr' => ['placeholder' => 'Competence'],
            'label' => false,
            
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Armes::class,
        ]);
    }
}
