<?php

namespace TodolistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function welcomeAction()
    {
        //return $this->render('@Todolist/Default/welcome.html.twig'); on écrit comme ça par défaut depuis 3.4
        return $this->render('TodolistBundle:Default:welcome.html.twig'); // si on veut utiliser la méthode "Classique"
    }
}
