<?php
namespace Ytnuk\Blog\Post\Form\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Blog\Post\Entity $post) : Ytnuk\Blog\Post\Form\Control;
}
