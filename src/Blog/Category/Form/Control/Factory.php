<?php
namespace Ytnuk\Blog\Category\Form\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Blog\Category\Entity $category) : Ytnuk\Blog\Category\Form\Control;
}
