<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use App\Form\AttributAmelioresType;
use App\Form\PersoType;
use App\Form\RecompenceType;
use App\Form\ArmesType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class EditPersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $armesNbr = [];
        $vertusNbr = [];
        $recompensesNbr = [];
       
        
        for ($i=0; $i < 7-$options['data']['nbrArmes']; $i++) { 
            $armesNbr[$i] = $i;
        }
        for ($i=0; $i < 6-$options['data']['nbrVertus']; $i++) { 
            $vertusNbr[$i] = $i;
        }
        for ($i=0; $i < 6-$options['data']['nbrRecompenses']; $i++) { 
            $recompensesNbr[$i] = $i;
        }
        $builder
            ->add('personnage', PersoType::class)
            ->add('attribut_ameliores', AttributAmelioresType::class)
            ->add('numberArmes', ChoiceType::class,[
                'choices'  =>  $armesNbr,
                'label'=>'Nombre d\'armes gagné',
                'mapped'=>'false' 
            ])
            ->add('numberVertus',  ChoiceType::class,[
                'choices'  =>  $vertusNbr,
                'label'=>'Nombre de vertus gagné',
                'mapped'=>'false' 
            ])
            ->add('numberRecompences',  ChoiceType::class,[
                'choices'  =>  $recompensesNbr,
                'label'=>'Nombre de recompences gagné',
                'mapped'=>'false' 
            ]);
            //For add arme, recompences or vertus
            $builder->get('numberArmes')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addArmes($form->getParent(), $form->getData());
                } 
            );
            $builder->get('numberVertus')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addVertus($form->getParent(), $form->getData());
                } 
            );
            $builder->get('numberRecompences')->addEventListener(
                FormEvents::POST_SUBMIT,
                function (FormEvent $event) {   
                    //récupère le formulaire
                    $form = $event->getForm();
                    $this->addRecompences($form->getParent(), $form->getData());
                } 
            );
           
            
            
    }
    public function addArmes(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'armes'.$i, ArmesType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    public function addVertus(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'vertus'.$i, VertusType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    public function addRecompences(FormInterface $form, $datas){
        for ($i=1; $i < $datas+1 ; $i++) {
            $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                'recompence'.$i, RecompenceType::class,null,[
                    'auto_initialize' => false, 
                    'data_class' =>null
                ]
                );
            $form->add($builder->getForm());
        }
        
    }
    /*'query_builder' => function(EntityRepository $er) use ($owner) {
                    return $er->createQueryBuilder('a')
                    ->join('a.senders', 'o')
                    ->where('o.id = :owner')
                    ->setParameter(':owner', $owner);
                }*/
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'validation_groups' => 'register'
        ]);
    }
}
