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
                    '文學院' => '文學院',
                    '社會科學院' => '社會科學院',
                    '管理學院' => '管理學院',
					'教育學院' => '教育學院',
					'理學院' => '理學院',
					'工學院' => '工學院',
					'法學院' => '法學院',
					'通識中心' => '通識中心',
					'體育中心' => '體育中心',
					'體育中心' => '體育中心',
					'獎助學金' => '獎助學金',
					'研究中心' => '研究中心',
                ],
                'attr' => [
                    // 'id' => 'department',
                    'name' => 'department',
                    'onchange' => "select_dept(this.value); select_project();",
                ],
            ])
            ->add('department', TextType::class, [
                'attr' => [
                    'hidden' => true,
                ]
                ]
            )
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