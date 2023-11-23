<?php

// src/Form/Type/ProjectType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('institution', ChoiceType::class, [
                'choices' => [
                    '中正大學' => '中正大學',
                    '工學院' => '工學院',
                    '理學院' => '理學院',
                ],
            ])
            ->add('department', TextType::class)
            ->add('name', TextType::class)
            ->add('available', ChoiceType::class, [
                'choices' => [
                    'yes' => True,
                    'no' => False,
                ],
                'expanded' =>	true,
            ])
            ->add('save', SubmitType::class)
        ;
    }
}