<?php
namespace Ytnuk\Blog\Post\Form;

use Ytnuk;

final class Control
	extends Ytnuk\Orm\Form\Control
{

	public function __construct(
		Ytnuk\Blog\Post\Entity $post,
		Ytnuk\Orm\Form\Factory $form
	) {
		parent::__construct(
			$post,
			$form
		);
	}
}
