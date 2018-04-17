<?php

namespace TodolistBundle\DataFixtures\ORM;

use TodolistBundle\Entity\Todos;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TodoFixtures implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$faker = \Faker\Factory::create();

		for($i = 0; $i < 100; $i++)
		{
			$todo = new Todos();
			$todo->setName($faker->name);
			$todo->setCategory($faker->word);
			$todo->setDescription($faker->text(200));
			$todo->setPriority('Hight');
			$todo->setDueDate(new \DateTime('+10 day'));
			$todo->setCreateDate(new \DateTime());
			$manager->persist($todo);
		}

		$manager->flush();
	}
}