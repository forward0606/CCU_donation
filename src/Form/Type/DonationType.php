<?php

// src/Form/Type/DonationType.php
namespace App\Form\Type;

use App\Entity\Project;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
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
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
	if ($options['filter'] == false) {
	    
        $builder
                ->add('identity_type', ChoiceType::class, [
                    'choices'  => [
                        '一般民眾' => 'normal',
                        '公司企業' => 'business',
                        '中正校友' => 'alumni',
                    ],
                ])
                ->add('name', TextType::class, [
                    'constraints' => [
                        new NotBlank(),
                    ],
                ])
                ->add('anonymous', ChoiceType::class, [
                    'choices'  => [
                        '是  ' => true,
                        '否  ' => false,
                    ],
                    'expanded' => true,
                ])
                ->add('person_id', TextType::class)
                ->add('email', EmailType::class)
                ->add('phone', TelType::class)
	            ->add('description', TextType::class, ['required' => false,])
                ->add('project_name', EntityType::class, [
                    'class' => Project::class, 
                    'choice_label' => 'id',
                    'placeholder' => 'Choose project id',
                    'attr' => [
                        'hidden' => true,
                    ]
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
                ->add('city', ChoiceType::class, [
                    'choices' => [
                        '基隆市' => '基隆市',
						'臺北市' => '臺北市',
						'新北市' => '新北市',
						'桃園市' => '桃園市',
						'新竹市' => '新竹市',
						'新竹縣' => '新竹縣',
						'苗栗縣' => '苗栗縣',
						'臺中市' => '臺中市',
						'彰化縣' => '彰化縣',
						'南投縣' => '南投縣',
						'雲林縣' => '雲林縣',
						'嘉義市' => '嘉義市',
						'嘉義縣' => '嘉義縣',
						'臺南市' => '臺南市',
                        '高雄市' => '高雄市',
                        '屏東縣' => '屏東縣',
                        '臺東縣' => '臺東縣',
                        '花蓮縣' => '花蓮縣',
                        '宜蘭縣' => '宜蘭縣',
                        '澎湖縣' => '澎湖縣',
                        '金門縣' => '金門縣',
                        '連江縣' => '連江縣',
                        '其他' => '其他',
                    ],
                    'attr' => [
                        'onchange' => "select_city(); select_area();",
                    ],
                    'choice_attr' => [
                        '其他' => ['hidden' => true],
                    ],
                ])
                ->add('district', TextType::class , [
                    'attr' => [
                        'hidden' => true,
                    ],
                ])
                ->add('address', TextType::class)
                ->add('save', SubmitType::class , [
                    'attr' => [
                        'hidden' => true,
                        'class' => 'custom-submit-button',
                    ],
	            ])
                // ->add('date', DateType::class)
                // ->add('pay_date', DateType::class)
                // ->add('status', TextType::class)
	    ;
	}
	else {
	    $builder
            ->add('andOperator', ChoiceType::class, [
                'choices' => [
                    'and' => true,
                    'or' => false,
                ],
                'mapped' => false,
            ])
            ->add('identity_type', ChoiceType::class, [
                'choices'  => [
                    'ALL' => null,
                    '一般民眾' => 'normal',
                    '公司企業' => 'business',
                    '中正校友' => 'alumni',
                ],
            ])
            ->add('name', TextType::class, ['required' => false,])
            ->add('anonymous', ChoiceType::class, [
                'choices'  => [
                    'ALL' => null,
                    '是' => 1,
                    '否' => 0,
                ],
            ])
            ->add('person_id', TextType::class, ['required' => false,])
            ->add('email', TextType::class, ['required' => false,])
            ->add('phone', TextType::class, ['required' => false,])
            ->add('project_name', EntityType::class, [ //if project's name is duplicate, they are distinct to one anoter.
                'class' => Project::class,
                'choice_label' => function($p){
                    if($p->getDepartment() == "無"){
                        return $p->getInstitution()." ".$p->getName();
                    }
                    return $p->getInstitution()." ".$p->getDepartment()." ".$p->getName();
                },
                'required' => false,
                'empty_data' => null,
            ])
            ->add('operator', ChoiceType::class, [
                'choices' => [
                    '>=' => '>=',
                    '<=' => '<=',
                    '=' => '=',
                ],
                'mapped' => false,
            ])
            ->add('money', MoneyType::class, [
                'currency' => null,
                'required' => false,
            ])
            ->add('pay', ChoiceType::class, [
		        'choices' => [
			        'ALL' => null,
                    '信用卡線上捐款' => 'VISA',
                ],
            ])

            ->add('title', TextType::class, ['required' => false,])
            ->add('type',  ChoiceType::class, [
		        'choices'  => [
		            'ALL' => null,
                    '電子收據' => 'electronic',
                    '紙本收據' => 'paper',
                    '不需要收據' => 'none',
		        ],
            ])

            ->add('zipcode', TextType::class, ['required' => false,])
            ->add('city', ChoiceType::class, [
                'choices' => [
                    'ALL' => null,
                    '基隆市' => '基隆市',
                    '臺北市' => '臺北市',
                    '新北市' => '新北市',
                    '桃園市' => '桃園市',
                    '新竹市' => '新竹市',
                    '新竹縣' => '新竹縣',
                    '苗栗縣' => '苗栗縣',
                    '臺中市' => '臺中市',
                    '彰化縣' => '彰化縣',
                    '南投縣' => '南投縣',
                    '雲林縣' => '雲林縣',
                    '嘉義市' => '嘉義市',
                    '嘉義縣' => '嘉義縣',
                    '臺南市' => '臺南市',
                    '高雄市' => '高雄市',
                    '屏東縣' => '屏東縣',
                    '臺東縣' => '臺東縣',
                    '花蓮縣' => '花蓮縣',
                    '宜蘭縣' => '宜蘭縣',
                    '澎湖縣' => '澎湖縣',
                    '金門縣' => '金門縣',
                    '連江縣' => '連江縣',
                ],
                'attr' => [
                    'onchange' => "select_city(); select_area();",
                ],
            ])
            ->add('district', TextType::class , [
                'required' => false,
            ])
            ->add('address', TextType::class, ['required' => false,])
            ->add('date', DateType::class, ['required' => false, 'mapped' => false,])
            ->add('pay_date', DateType::class, ['required' => false, 'mapped' => false,])
		    ->add('status', ChoiceType::class, [
		        'choices' => [
			        'ALL' => null,
		            'not yet' => 'not yet',
		            'delivered' => 'delivered',
		            'none' => 'none',
		        ]
		    ])
            ->add('submit', SubmitType::class , [
                'attr' => [
                    'class' => 'custom-submit-button',
                ],
            ]);
	    }
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'filter' => false,
        ]);

        $resolver->setAllowedTypes('filter', 'bool');
    }

}
