<?php

// src/Form/Type/DonationType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('money', TextType::class)
            ->add('person_id', TextType::class)
            ->add('email', TextType::class)
            ->add('phone', TextType::class)
            ->add('anonymous', TextType::class)
            ->add('identity_type', TextType::class)
            ->add('department', TextType::class)
            ->add('project', TextType::class)
            ->add('pay', TextType::class)
            ->add('status', TextType::class)
            ->add('type', TextType::class)
            ->add('date', DateType::class)
            ->add('pay_date', DateType::class)
            ->add('description', TextType::class)
            ->add('address', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}