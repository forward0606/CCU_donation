<?php

// src/Form/Type/DonationType.php
namespace App\Form\Type;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identity_type', ChoiceType::class, [
                'choices'  => [
                    '一般民眾' => 'normal',
                    '公司企業' => 'business',
                    '中正校友' => 'alumni',
                ],
            ])
            ->add('name', TextType::class)
            ->add('anonymous', ChoiceType::class, [
                'choices'  => [
                    '是' => true,
                    '否' => false,
                ],
                'expanded' => true,
            ])
            ->add('person_id', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TelType::class)
            ->add('description', TextType::class)
            
            ->add('project_name', EntityType::class, [
                'class' => Project::class, 
                'choice_label' => 'id',
                'placeholder' => 'Choose project id',
            ])
            ->add('money', MoneyType::class, [
                'currency' => null,
            ])
            ->add('pay', ChoiceType::class, [
                'choices' => [
                    '信用卡線上捐款' => 'VISA',
                ],
            ])

	        ->add('title', TextType::class) 
            ->add('type',  ChoiceType::class, [
                'choices'  => [
                    '電子收據' => 'electronic',
                    '紙本收據' => 'paper',
                    '不需要收據' => 'none',
                ],
            ])

            ->add('zipcode', TextType::class)
            ->add('address', TextType::class)
            ->add('save', SubmitType::class , [
                'attr' => [
                    'class' => 'custom-submit-button',
                ],
            ])

            // ->add('date', DateType::class)
            // ->add('pay_date', DateType::class)
            // ->add('status', TextType::class)
        ;
    }
}
