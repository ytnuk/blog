<?php
namespace Ytnuk\Blog\Control;

use Ytnuk;

interface Factory
{

	public function create() : Ytnuk\Blog\Control;
}
