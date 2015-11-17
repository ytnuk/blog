<?php
namespace Ytnuk\Blog\Post\Description\Form;

use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	public function setValues(
		$values,
		$erase = FALSE
	) : Ytnuk\Orm\Form\Container
	{
		if (isset($values['value'], $values['value']['translates']) && (array) $values['value']['translates']) {
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
