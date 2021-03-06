<?php
namespace Ytnuk\Blog\Post\Category;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\ManyHasOne|Ytnuk\Blog\Post\Entity $post {m:1 Ytnuk\Blog\Post\Entity::$categoryNodes}
 * @property Nextras\Orm\Relationships\ManyHasOne|Ytnuk\Blog\Category\Entity $category {m:1 Ytnuk\Blog\Category\Entity, oneSided=true}
 * @property bool|NULL $primary
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'category';
}
