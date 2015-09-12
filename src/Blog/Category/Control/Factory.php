<?php
namespace Ytnuk\Blog\Category\Control;

use Ytnuk;

interface Factory
{

	public function create(Ytnuk\Blog\Category\Entity $category) : Ytnuk\Blog\Category\Control;
}
