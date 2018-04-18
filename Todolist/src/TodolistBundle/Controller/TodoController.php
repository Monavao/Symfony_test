<?php

namespace TodolistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TodolistBundle\Entity\Todos;
use TodolistBundle\Form\TodoCreateType;

class TodoController extends Controller
{
	public function listAction()
	{
		$em = $this->getDoctrine()->getManager();

		$todos = $em->getRepository('TodolistBundle:Todos')->findAll();

		return $this->render('TodolistBundle:Default:todoList.html.twig', array(
			'todos' => $todos
		));
	}

	public function detailsAction($id)
	{
		return $this->render('TodolistBundle:Default:todoDetails.html.twig');
	}

	public function createAction(Request $request)
	{
		$createTodoForm = $this->createForm(TodoCreateType::class, null);
		$createTodoForm->handleRequest($request);

		if($createTodoForm->isSubmitted() && $createTodoForm->isValid())
		{
			$name = $createTodoForm['name']->getData();
			$category = $createTodoForm['category']->getData();
			$description = $createTodoForm['description']->getData();
			$priority = $createTodoForm['priority']->getData();
			$dueDate = $createTodoForm['due_date']->getData();
			$creationDate = new \DateTime('now');

			$add = $this->addTodo($name, $category, $description, $priority, $dueDate, $creationDate);

			//$request->getFlashBag()->add('success','Todo added');

			return $this->redirectToRoute('todolist_list');
		}

		return $this->render('TodolistBundle:Default:todoCreate.html.twig', array(
			'createTodoForm' => $createTodoForm->createView()
		));
	}

	public function editAction(Request $request, $id)
	{
		return $this->render('TodolistBundle:Default:todoEdit.html.twig');
	}

	public function addTodo($name, $category, $description, $priority, $dueDate, $creationDate)
	{
		$todo = new Todos();

		$todo->setName($name);
		$todo->setCategory($category);
		$todo->setDescription($description);
		$todo->setPriority($priority);
		$todo->setDueDate($dueDate);
		$todo->setCreationDate($creationDate);

		$em = $this->getDoctrine()->getManager();
		$em->persist($todo);
		$em->flush();
	}
}
