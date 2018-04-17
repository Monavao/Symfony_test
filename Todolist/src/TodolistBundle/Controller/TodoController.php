<?php

namespace TodolistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TodolistBundle\Entity\Todos;

class TodoController extends Controller
{
	public function listAction()
	{
		$em = $this->getDoctrine()->getRepository('TodolistBundle:Todos')->findAll();

		return $this->render('TodolistBundle:Default:todoList.html.twig');
	}

	public function detailsAction($id)
	{
		return $this->render('TodolistBundle:Default:todoDetails.html.twig');
	}

	public function createAction()
	{
		return $this->render('TodolistBundle:Default:todoCreate.html.twig');
	}

	public function editAction(Request $request, $id)
	{
		return $this->render('TodolistBundle:Default:todoEdit.html.twig');
	}
}