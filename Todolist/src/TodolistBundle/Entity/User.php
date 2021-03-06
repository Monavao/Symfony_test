<?php

namespace TodolistBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="TodolistBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Todos", mappedBy="user")
     */
    protected $todos;

    public function __construct()
    {
        parent::__construct();
        $this->todos = new ArrayCollection();
    }

    /**
     * Add todo.
     *
     * @param \TodolistBundle\Entity\Todos $todo
     *
     * @return User
     */
    public function addTodo(\TodolistBundle\Entity\Todos $todo)
    {
        $this->todos[] = $todo;

        return $this;
    }

    /**
     * Remove todo.
     *
     * @param \TodolistBundle\Entity\Todos $todo
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTodo(\TodolistBundle\Entity\Todos $todo)
    {
        return $this->todos->removeElement($todo);
    }

    /**
     * Get todos.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTodos()
    {
        return $this->todos;
    }
}
