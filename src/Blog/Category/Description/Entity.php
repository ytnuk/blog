<?php
namespace Ytnuk\Blog\Category\Description;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Blog\Category\Entity $category {1:1 Ytnuk\Blog\Category\Entity::$description, isMain=true}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Translation\Entity|NULL $value {1:1 Ytnuk\Translation\Entity, oneSided=true, isMain=true}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'value';
}
