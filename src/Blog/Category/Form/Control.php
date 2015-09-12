<?php
namespace Ytnuk\Blog\Category\Form;

use Ytnuk;

final class Control
	extends Ytnuk\Orm\Form\Control
{

	public function __construct(
		Ytnuk\Blog\Category\Entity $category,
		Ytnuk\Orm\Form\Factory $form
	) {
		parent::__construct(
			$category,
			$form
		);
	}
}
