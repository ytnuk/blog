<?php
namespace Ytnuk\Blog\Category\Description\Form;

use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	public function setValues(
		$values,
		$erase = FALSE
	) : Ytnuk\Orm\Form\Container
	{
		if ((array) $values->value->translates) {
			return parent::setValues(
				(array) $values,
				$erase
			);
		} else {
			$this->removeEntity(FALSE);

			return $this;
		}
	}
}
