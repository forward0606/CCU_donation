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

class DonationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
	/*    
	$formModifier = function (FormInterface $form, Project $project = null):void
	{
            //to add a select(choices depend on current chosen institution) but not working. no idea about how to save entity from frontend also.
	    $institution = null===$project ? null : $project->getInstitution();
	    if ($institution && isset($institution)) {
                $form->add('department', EntityType::class, [
                    'class' => Project::class,
                    'choice_label' => 'department',
                    'mapped' => false,
		    'query_builder' => function(EntityRepository $er): QueryBuilder {
                        return $er->createQueryBuilder('p')->where('p.institution = :institution')->setParameter('institution', $institution); //error:undefined $institution
                    },
		    'choice_value' => 'department',
		    'placeholder' => '',
		]);
	    }
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
	    ->add('institution', EntityType::class, [ //could display select in add.html.twig but didn't check whether error occurs
	        'class' => Project::class,
		'choice_label' => 'institution',
		'mapped' => false,
		'query_builder' => function(EntityRepository $er): QueryBuilder {
		    return $er->createQueryBuilder('p')->orderBy('p.institution', 'ASC');
		},
		'choice_value' =>'institution', //邪門辦法除去duplicate
	    ])
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
	/* //several error and i don't get it..
	$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($formModifier): void 
	    {
	        $project = $event->getData()->getProjectName();
	        $formModifier($event->getForm(), $project);
	    }
	);
	$builder->get('institution')->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($formModifier): void 
	    {
		$project = $event->getForm()->getData();
		$formModifier($event->getForm()->getParent(), $project);
	    }
	);
	$builder->setAction($options['action']);
	*/
    }
}
