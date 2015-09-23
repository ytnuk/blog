<?php
namespace Ytnuk\Blog\Application;

use Ytnuk;

abstract class Presenter
	extends Ytnuk\Web\Application\Presenter
{

	/**
	 * @var Ytnuk\Blog\Control\Factory
	 */
	private $control;

	public function injectBlog(Ytnuk\Blog\Control\Factory $control)
	{
		$this->control = $control;
	}

	protected function createComponentBlog() : Ytnuk\Blog\Control
	{
		return $this->control->create();
	}
}
