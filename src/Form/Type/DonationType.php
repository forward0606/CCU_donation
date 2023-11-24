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
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
	/*
	$institutions = ["中正大學", "文學院", "社會科學院", "管理學院", "教育學院", "理學院", "工學院", "法學院", "通識中心", "體育中心", "師培中心", "獎助學金", "研究中心"];
        $departmentListener = function(FormEvent $event){
            $form = $event->getForm();
            $data = $event->getData();
            $institution = $data->getInstitution(); //no getInstitution(). need to figure out another way.
            switch ($institution){
                case "中正大學":
                    $department = ["hidden"];
                    break;
                case "文學院":
                    $department = ["歷史學系","哲學系","中國文學系","外國語文學系","台文創應所","語言所"];
                    break;
                case "社會科學院":
                    $department = ["社會福利學系","心理學系","勞工關係學系","政治學系","傳播學系","戰略暨國際事務研究所"];
                    break;
                case "管理學院":
                   $department = ["經濟學系","財務金融學系","企業管理學系","會計與資訊科技學系","資訊管理學系"];
                   break;
                            case "教育學院":
                   $department = ["成人及繼續教育學系","犯罪防治學系","運動競技學系"];
                   break;
                case "理學院":
                   $department = ["數學系","地球與環境科學系","物理系","化學暨生物化學系","生物醫學科學系"];
                   break;
                case "工學院":
                   $department = ["資訊工程學系","電機工程學系","機械工程學系","化學工程學系","通訊工程學系"];
                   break;
                case "法學院":
                   $department = ["法律學系","財經法律學系","法學院"];
                   break;
                case "通識中心":
                   $department = ["hidden"];
                   break;
                case "體育中心":
                   $department = ["hidden"];
                   break;
                case "師培中心":
                   $department = ["hidden"];
                   break;
                case "獎助學金":
                   $department = ["hidden"];
                   break;
                case "研究中心":
                   $department = ["hidden"];
                   break;
            }
            $form->add('department', ChoiceType::class, [
                'choices' => $department,
                'choice_label' => function($choice, $key){return $choice;},
            ]);
        };
        */
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
            /*
	    ->add('institutions', ChoiceType::class, [
	        'choices' => $institutions,
		'choice_label' => function($choice, $key) {return $choice;},
	    ])
	    ->addEventListener(FormEvents::PRE_SET_DATA, $departmentListener)
            ->addEventListener(FormEvents::PRE_SUBMIT, $departmentListener)
            */
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
