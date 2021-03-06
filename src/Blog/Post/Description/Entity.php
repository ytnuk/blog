<?php
namespace Ytnuk\Blog\Post\Description;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Blog\Post\Entity $post {1:1 Ytnuk\Blog\Post\Entity::$description, isMain=true}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Translation\Entity|NULL $value {1:1 Ytnuk\Translation\Entity, oneSided=true, isMain=true, cascade=[persist, remove]}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'value';
}
