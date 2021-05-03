<?php

namespace App\Form;

use App\Entity\Testimony;
use Brokoskokoli\StarRatingBundle\Form\RatingType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('company', TextType::class, [
                'label' => 'Nom ou Entreprise',
            ])
            ->add('activity', TextType::class, [
                'label' => 'Secteur d\'activité',
            ])
            ->add('comment',TextareaType::class, [
                'label' => 'Commentaires',
            ])
            ->add('rate', HiddenType::class, [
                'label' => 'Note'
            ])
            ->add('submit' , SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-block btn-outline-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
