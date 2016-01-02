<?php
namespace Ytnuk\Blog\Post;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Translation\Entity $title {1:1 Ytnuk\Translation\Entity, oneSided=true, isMain=true, cascade=[persist, remove]}
 * @property Nextras\Orm\Relationships\OneHasOne|Description\Entity|NULL $description {1:1 Description\Entity::$post}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Translation\Entity $content {1:1 Ytnuk\Translation\Entity, oneSided=true, isMain=true, cascade=[persist, remove]}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Link\Entity $link {1:1 Ytnuk\Link\Entity, oneSided=true, isMain=true}
 * @property Nextras\Orm\Relationships\OneHasMany|Category\Entity[] $categoryNodes {1:m Category\Entity::$post}
 * @property-read Ytnuk\Blog\Category\Entity|NULL $category {virtual}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'title';

	public function getterCategory()
	{
		$node = $this->categoryNodes->get()->findBy(['primary' => TRUE])->fetch();

		return $node instanceof Category\Entity ? $node->category : NULL;
	}
}
