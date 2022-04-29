<?php

namespace App\Form;

use App\Entity\Partie;
use App\Entity\Personnage;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];
        $builder
            ->add('nom', TextType::class,[
                'attr'=>['placeholder' => 'Nom de l\'histoire'],
                'label'=>false
            ])
            ->add('joueurs', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) use($user) {
                    return $er->findFriends($user);
                },
                'choice_label' => 'pseudo',
                'choice_value'=>'pseudo',
                'multiple'=>true,
                'expanded'=>true,
                'attr'=>['class'=>'chxck'],
                'label'=>false
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partie::class,
            'user'=>null
        ]);
    }
}
