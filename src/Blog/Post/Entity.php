<?php
namespace Ytnuk\Blog\Post;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Translation\Entity $title {1:1d Ytnuk\Translation\Entity::$post, primary=true}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Description\Entity|NULL $description {1:1d Description\Entity::$post}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Translation\Entity $content {1:1d Ytnuk\Translation\Entity::$post, primary=true}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Link\Entity $link {1:1d Ytnuk\Link\Entity::$post, primary=true}
 * @property Nextras\Orm\Relationships\OneHasMany|Category\Entity[] $categoryNodes {1:m Category\Entity::$post}
 * @property-read Nextras\Orm\Collection\ICollection|Ytnuk\Blog\Category\Entity[] $categories {virtual}
 * @property-read Ytnuk\Blog\Category\Entity|NULL $category {virtual}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'title';

	/**
	 * @var Ytnuk\Blog\Category\Repository
	 */
	private $categoryRepository;

	public function getterCategories() : Nextras\Orm\Collection\ICollection
	{
		return $this->categoryRepository->findBy(['this->postNodes->post' => $this->id]);
	}

	public function getterCategory()
	{
		$node = $this->categoryNodes->get()->findBy(['primary' => TRUE])->fetch();

		return $node instanceof Category\Entity ? $node->category : NULL;
	}

	public function injectCategoryRepository(Ytnuk\Blog\Category\Repository $repository)
	{
		$this->categoryRepository = $repository;
	}
}
