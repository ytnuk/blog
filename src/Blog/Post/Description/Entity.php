<?php
namespace Ytnuk\Blog\Post\Description;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Blog\Post\Entity $post {1:1d Ytnuk\Blog\Post\Entity::$description, primary=true}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Translation\Entity|NULL $value {1:1d Ytnuk\Translation\Entity::$description, primary=true}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'value';
}
