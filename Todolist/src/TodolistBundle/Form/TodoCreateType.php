<?php

namespace TodolistBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TodoCreateType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', TextType::class, array('attr' => array('placeholder' => 'Name')))
			->add('category', ChoiceType::class, array('choices' =>array('Home' => 'Home', 'Work' => 'Work', 'Travel' => 'Travel')))
			->add('description', TextareaType::class, array('attr' => array('placeholder' => 'Description')))
			->add('priority', ChoiceType::class, array('choices' =>array('Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High')))
			->add('due_date', DateTimeType::class)
			->add('save', SubmitType::class);
	}
}
