<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Type;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        if ($options['add'] == true):

            $builder
                ->add('title', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir le nom du produit'
                    ]

                ])
                ->add('reference', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir la référence du produit'
                    ]

                ])
                ->add('description', TextareaType::class, [
                    'required' => false,
                    'label' => false
                ])
                ->add('price', NumberType::class, [
                    'required' => false,
                    'label' => false,
                    'invalid_message' => 'Le type est incorrect',
                    'attr' => [
                        'placeholder' => 'Saisir le prix du produit'
                    ]
                ])
                ->add('picture', FileType::class, [
                    'required' => false,
                    'label' => false,
                    'constraints' => [
                        new File([
                            'mimeTypes' => [
                                "image/png",
                                "image/jpg",
                                "image/jpeg"
                            ],
                            'mimeTypesMessage' => 'Extensions autorisées: PNG, JPG, JPEG'
                        ])
                    ]

                ])
                ->add('brand', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir la marque du produit'
                    ]

                ])
                ->add('gender', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Choisissez une option',
                    'choices' => [
                        'Homme' => 'Homme',
                        'Femme' => 'Femme',
                        'Enfant' => 'Enfant'
                    ]
                ])
                ->add('category',EntityType::class,[
                    'required' => false,
                    'label' => false,
                    'class'=>Category::class,
                    'choice_label'=>'title'

                ])
                ->add('Enregistrer', SubmitType::class);

        elseif ($options['edit'] == true):

            $builder
                ->add('category',EntityType::class,[
                    'required' => false,
                    'label' => false,
                    'class'=>Category::class,
                    'choice_label'=>'title'

                ])
                ->add('title', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir le nom du produit'
                    ]

                ])
                ->add('reference', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir la référence du produit'
                    ]

                ])
                ->add('description', TextareaType::class, [
                    'required' => false,
                    'label' => false
                ])
                ->add('price', NumberType::class, [
                    'required' => false,
                    'label' => false,
                    'invalid_message' => 'Le type est incorrect',
                    'attr' => [
                        'placeholder' => 'Saisir le prix du produit'
                    ]
                ])
                ->add('editPicture', FileType::class, [
                    'required' => false,
                    'label' => false,
                    'constraints' => [
                        new File([
                            'mimeTypes' => [
                                "image/png",
                                "image/jpg",
                                "image/jpeg"
                            ],
                            'mimeTypesMessage' => 'Extensions autorisées: PNG, JPG, JPEG'
                        ])
                    ]

                ])
                ->add('brand', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Saisir la marque du produit'
                    ]

                ])
                ->add('gender', ChoiceType::class, [
                    'required' => false,
                    'label' => false,
                    'placeholder' => 'Choisissez une option',
                    'choices' => [
                        'Homme' => 'Homme',
                        'Femme' => 'Femme',
                        'Enfant' => 'Enfant'
                    ]
                ])
                ->add('Enregistrer', SubmitType::class);

        endif;


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'add'=>false,
            'edit'=>false
        ]);
    }
}
