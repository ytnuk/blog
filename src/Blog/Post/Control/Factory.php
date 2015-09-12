<?php
namespace Ytnuk\Blog\Post\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Blog\Post\Entity $post) : Ytnuk\Blog\Post\Control;
}
