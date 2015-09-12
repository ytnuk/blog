<?php
namespace Ytnuk\Blog\Post\Category\Form;

use Nette;
use Nextras;
use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	protected function addProperty(Nextras\Orm\Entity\Reflection\PropertyMetadata $metadata)
	{
		$component = parent::addProperty($metadata);
		if ($component instanceof Nette\Forms\Controls\BaseControl) {
			switch ($metadata->name) {
				case 'post':
				case 'category':
					$component->setOption(
						'unique',
						TRUE
					);
					break;
				case 'primary':
					$component->setOption(
						'unique',
						'post'
					);
					break;
			}
		}

		return $component;
	}
}
