<?php

namespace App\Form;

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
use Symfony\Component\Validator\Constraints\NotBlank;

class PersonnageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabClasse = [];
        foreach ($Classe["Classe"] as $classe){
            $tabClasse[$classe["nom"]] = $classe["nom"];
        }
        
        $builder
        
                ->add('nom',TextType::class, [
                    'attr' => ['placeholder' => 'Votre Nom'],
                    'label' => false
                    ])
                ->add('classe',ChoiceType::class, [
                'choices'  =>  $tabClasse,
                'placeholder' => 'Votre classe',
                
                ])
                ->add('origine', ChoiceType::class, [
                    'choices'  => [],
                    'placeholder' => 'Séléctionnez une origine',
                    'mapped'=>false,
                    'auto_initialize' => false,
                    'label' => false,
                    'attr' => ['data-id' => 'dNoneOrigine']
                ])
                ->add('vocation', ChoiceType::class,[
                    'choices'  =>  [],
                    'placeholder' => 'Séléctionnez une vocation',
                    'mapped'=>false,
                    'auto_initialize' => false,
                    'label' => false,
                    'attr' => ['data-id' => 'dNoneVocation']
                ]);
        

        $builder->get('classe')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {   
                $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
                //récupère le formulaire
                $form = $event->getForm();
                $this->addClassAtribut($form->getParent(), $form->getData(), $Classe);
            } 
        );
        $builder->get('origine')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {         
                //récupère le formulaire
                $form = $event->getForm();
                $this->addOrigineAtribut($form->getParent(), $form->getData());
            }
            
        );
        $builder->get('vocation')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {   
                //récupère le formulaire
                $form = $event->getForm();
                $this->addVocationAtribut($form->getParent(), $form->getData());
            }
            
        );
        
    }
    
  
        
    // Ajoute La classe, les compétences, standard de vie, avantage culturel + select origine
    private function addClassAtribut(FormInterface $form, $formData, $allClasses)
    {    
        $tabOrigine = [];
        $tabSpecialite1 = [];
        $tabSpecialite2 = [];
        $tabArmes = [];
        $tabVocation = [];
        $int = 1;
        foreach ($allClasses["Classe"] as $classe){
            
            // compare le perso selectionné au JSON 
            if ($classe["nom"] == $formData ) {
                
                //************On ajoute les champs relatifs à la classe************

                //Vient chercher les compétences du personnage séléctionné pour les mettre dans le tableau
                $tabCompetences["competence"] = $classe["competence"];
                
                //************ARMES************
                //Vient chercher les armes du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["Armes"] as $data) {
                    $listArmes = $data["1"]["nom"].' ('.$data["1"]["competence"].'), '.$data["2"]["nom"].' ('.$data["2"]["competence"].'), '.$data["3"]["nom"].' ('.$data["3"]["competence"].')';
                    $tabArmes[$listArmes] = $listArmes;
                    
                }
                //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'armes', ChoiceType::class, null, [
                        'choices'  =>  $tabArmes,
                        'placeholder' => 'Séléctionnez un competence d\'armes',
                        'auto_initialize' => false, 
                        'mapped' =>false,
                        'label' => 'Armes',
                    ],
                );
                $form->add($builder->getForm());
                //************ARMES************

                //************SPECIALITES************
                //Vient chercher la  1 specialite du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["specialite"] as $data) {
                    $tabSpecialite1[$data] = $data;
                }
                //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'specialites1', ChoiceType::class, null, [
                        'choices'  =>  $tabSpecialite1,
                        'placeholder' => 'Séléctionnez 1ére specialité',
                        'mapped'=>false,
                        'auto_initialize' => false, 
                        'label' => 'Premiere specialité',
                    ],
                );
                $form->add($builder->getForm());
                //Vient chercher la  2 specialite du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["specialite"] as $data) {
                    $tabSpecialite2[$data] = $data;
                }
                //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'specialites2', ChoiceType::class, null, [
                        'choices'  =>  $tabSpecialite2,
                        'placeholder' => 'Séléctionnez une 2éme specialité',
                        'mapped'=>false,
                        'auto_initialize' => false, 
                        'label' => 'Deuxieme specialité',
                    ],
                );
                $form->add($builder->getForm());
                
                //************SPECIALITES************
                $form->add('standard_de_vie', TextType::class, [
                    'attr' => ['value' => $classe["standard de vie"]],
                    ])
                    ->add('avantage_culturel', TextType::class, [
                        'attr' => ['value' => $classe["Avantage culturel"], 'class' => 'form-control-sm col-2'],
                    ]);
                //add un champ form pour chaque champ de compétence
                foreach ($tabCompetences["competence"] as $key => $value) {
                    $form->add( $key, IntegerType::class, [
                        'attr' => ['value' =>  $value, 'class' => 'form-control-sm col-2']
                    ]);
                }
                 //************On ajoute les champs relatifs à la classe************
                
                

                //************ORIGINE************

                //Vient chercher l'origine du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["Origine"] as $data) {
                    $tabOrigine[$data['nom']] = $data['nom'];
                }
                //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'origine', ChoiceType::class, null, [
                        'choices'  =>  $tabOrigine,
                        'placeholder' => 'Séléctionnez une origine',
                        'auto_initialize' => false,  
                    ],
                );
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addOrigineAtribut($form->getParent(), $form->getData());
                    }
                  );

                $form->add($builder->getForm());

                //************ORIGINE************

                
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addOrigineAtribut($form->getParent(), $form->getData());
                    }
                  );

                $form->add($builder->getForm());

                //************VOCATION************

                //Vient chercher les vocations du personnage dans le JSON pour la mettre dans le tableau
                foreach ($classe["Vocation"] as $data) {
                    $tabVocation[$data['nom']] = $data['nom'];
                }

               //On vient mettre les bonnes données dans le builder
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'vocation', ChoiceType::class, null, [
                        'choices'  =>  $tabVocation,
                        'placeholder' => 'Séléctionnez une origine vocation',
                        'auto_initialize' => false,  
                    ]
                );
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addVocationAtribut($form->getParent(), $form->getData());
                    }
                  );  
                $form->add($builder->getForm());

                /*******Vertus ou recompenses**********/
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'valeurPrincipale', ChoiceType::class, null, [
                    'label'    => 'Valeur princiapel',
                    'choices'  =>  ['Sagesse' =>'Sagesse:'.$formData,
                                    'Vaillance' => 'Vaillance:'.$formData
                                ],
                    'mapped' => false,
                    'auto_initialize' => false,
                ]);
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                        function (FormEvent $event) {
                            $form = $event->getForm();
                            $this->addVertusOrRecompense($form->getParent(), $form->getData());
                        }
                    );
                $form->add($builder->getForm()); 

            }
            
        }
    }
    
    //Ajoute les champs particularités 
    private function addOrigineAtribut(FormInterface $form, $data){
        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabParticularite = [];

        foreach ($Classe["Classe"] as $value){
            $espoir = $value['Espoir'];
            $endurance =  $value['Endurance'];
            foreach ($value["Origine"] as $origine){
                if ($origine["nom"] == $data ) {

                    //PARTICULARITES
                    //On ajoute toutes les particularitées dans le tableau
                    foreach ($origine["Particularite"] as $dataOrigine) {
                        $tabParticularite[$dataOrigine] = $dataOrigine;
                    }
                    $form->add('endurance', IntegerType::class, [
                        'label'=> 'Endurance',
                        'attr' => ['value' =>  $endurance],
                    ]);
                    $form->add('Particularite', ChoiceType::class, [
                        'label'    => 'Particularités',
                        'choices'  =>  $tabParticularite,
                        'mapped'=>false
                        //'expanded'=>true
                    ]);

                    //On ajoute les champs relatifs aux origines
                    $form->add('competence_favorite', TextType::class, [
                        'attr' => ['value' => $origine["competence favorite"]],
                    ]);
                    foreach ($origine["Attribut de base"] as $key => $value) {
                        $form->add( $key, IntegerType::class, [
                            'attr' => ['value' =>  $value]
                        ]);
                    }

                    $espoir +=  $origine["Attribut de base"]['coeur'];
                    $endurance +=  $origine["Attribut de base"]['coeur'];
                    $form->add('espoir', IntegerType::class, [
                        'label'    => 'Espoir',
                        'attr' => ['value' =>  $espoir ],
                    ]);

                    $form->add('endurance', IntegerType::class, [
                        'label'    => 'Endurance',
                        'attr' => ['value' =>  $endurance],
                    ]);
                   
                }
            } 
           
        }
    }

    private function addVocationAtribut(FormInterface $form, $data){

        $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        $tabVocations = [];
        $tabAttributCorps = [];
        foreach ($Classe["Classe"] as $value){
            foreach ($value["Vocation"] as $vocation){
            
                if ($vocation["nom"] == $data ){

                    foreach ($vocation["competences_favorites"] as $dataCompetencesFav) {
                        $tabVocations[$dataCompetencesFav] = $dataCompetencesFav;
                    }

                    $form->add('competences_favorites_vocation', ChoiceType::class, [
                        'label'    => 'Competences vocation',
                        'choices'  =>  $tabVocations,
                        'empty_data' => 1
                    ]);
                    
                    
                    $form->add('part_ombre', TextType::class, [
                        'attr' => ['value' => $vocation["part d'ombre"]],
                    ])
                    ->add('traits', TextType::class, [
                        'attr' => ['value' => $vocation["traits"]],
                    ]);
                    

                    
                }    
            }
             //************ATTRIBUT AMELIORES************
                //************Corps************
                foreach ($Classe["Attribut ameliorés"]["corps"] as $attibutAmeliores) {
                    $tabAttributCorps[$attibutAmeliores] = $attibutAmeliores;
                    //On vient mettre les bonnes données dans le builder
                }
                $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    'attributCorps', ChoiceType::class, null, [
                    'choices'  =>  $tabAttributCorps,
                    'label'=>'Attribut à ameliorés : Corps :',
                    'mapped'=>false,
                    'auto_initialize' => false,
                    ],
                );
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                FormEvents::POST_SUBMIT,
                    function (FormEvent $event) {
                        $form = $event->getForm();
                        $this->addAtributAmelioreCoeur($form->getParent(), $form->getData());
                    }
                );
                $form->add($builder->getForm()); 
            //************ATTRIBUT AMELIORES************    
        }
    }
    
    private function addAtributAmelioreCoeur(FormInterface $form, $data)
    { 
        $tabAttributCoeur = [];
        $AttributAmeliores = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
        foreach ($AttributAmeliores["Attribut ameliorés"]["coeur"] as $attributCoeur){
            if($attributCoeur!=$data){
                $tabAttributCoeur[$attributCoeur] = $attributCoeur.':'.$data;
            }
            //On vient mettre les bonnes données dans le builder
            if($data){
                $builder =$form->getConfig()->getFormFactory()->createNamedBuilder(
                    'attributCoeur', ChoiceType::class, null, [
                    'choices'  =>  $tabAttributCoeur,
                    'mapped'=>false,
                    'auto_initialize' => false, 
                    'label' => ' Coeur :',
                ]);
                //On parametre le listener avec la fonction de ce qu'il doit faire
                $builder->addEventListener(
                    FormEvents::POST_SUBMIT,
                        function (FormEvent $event) {
                            $form = $event->getForm();
                            $this->addAtributAmelioreEsprit($form->getParent(), $form->getData());
                        }
                    );
                $form->add($builder->getForm()); 
            }
        }
    }

    private function addAtributAmelioreEsprit(FormInterface $form, $data)
    { 
        $tabAttributEsprit = [];
        $allData= explode(":", $data);
        if($data){
            $dataCorps =  $allData[1];
            $dataCoeur =  $allData[0];
        
            $AttributAmeliores = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
            foreach ($AttributAmeliores["Attribut ameliorés"]["esprit"] as $attributEsprit){
                if($attributEsprit!=$dataCorps  && $attributEsprit!=$dataCoeur){
                    $tabAttributEsprit[$attributEsprit] = $attributEsprit;
                }
                //On vient mettre les bonnes données dans le builder
                if( $dataCorps && $dataCoeur){
                    $form->add('attributEsprit', ChoiceType::class, [
                        'choices'  =>  $tabAttributEsprit,
                        'mapped'=>false,
                        'auto_initialize' => false, 
                        'label' => ' Esprit :'
                    ]);
                }
            }
        }
    }
    private function addVertusOrRecompense(FormInterface $form, $data)
    { 
        $value = explode(":", $data);
        $tabVertus=[];
        $tabRecompense=[];
        if($value[0] != ''){
            $valeurPrincipaleData = $value[0];
            $classeData = $value[1];
            $valeurPrincipale = '';
            $Classe = json_decode(file_get_contents('../public/json/FichesPersos.json'),true);
            foreach ($Classe["Classe"] as $classe){
                // compare le perso selectionné au JSON 
                if ($classe["nom"] == $classeData ) {
                    //si la valeur principal est la sagesse alors on lui propose une vertus
                    if($valeurPrincipaleData=='Sagesse'){
                        foreach ($classe['Vertus'] as $vertus){
                            $tabVertus[$vertus]=$vertus;
                        }
                        $form->add('vertus', ChoiceType::class, [
                            'choices'  =>  $tabVertus,
                            'mapped'=>false,
                            'auto_initialize' => false, 
                            'label' => ' Choississez une vertus :'
                        ]);
                        $valeurPrincipale = 'vertus';
                    }
                    else{
                        foreach ($classe['Recompence'] as $recompence){
                            $tabRecompense[$recompence]=$recompence;
                        }
                        $form->add('recompence', ChoiceType::class, [
                            'choices'  =>  $tabRecompense,
                            'mapped'=>false,
                            'auto_initialize' => false, 
                            'label' => ' Choississez une recompence :'
                        ]);
                        $valeurPrincipale = 'recompence';
                    }
                    $form->add('valeurPrinciapelHidden', HiddenType::class, [
                        'attr' => ['value' => $valeurPrincipale],
                        'mapped'=>false,
                    ]);
                    
                }
            }
            
        }
        
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
