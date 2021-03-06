<?php
namespace Ytnuk\Blog\Category;

use Nextras;
use Ytnuk;

/**
 * @property int $id {primary}
 * @property Nextras\Orm\Relationships\OneHasOne|Description\Entity|NULL $description {1:1 Description\Entity::$category, cascade=[persist, remove]}
 * @property Nextras\Orm\Relationships\OneHasOne|Ytnuk\Menu\Entity $menu {1:1 Ytnuk\Menu\Entity, oneSided=true, isMain=true, cascade=[persist, remove]}
 * @property-read Nextras\Orm\Collection\ICollection|Ytnuk\Blog\Post\Entity[] $posts {virtual}
 */
final class Entity
	extends Ytnuk\Orm\Entity
{

	const PROPERTY_NAME = 'menu';

	/**
	 * @var Ytnuk\Blog\Post\Repository
	 */
	private $postRepository;

	public function getterPosts() : Nextras\Orm\Collection\ICollection
	{
		return $this->postRepository->findBy(['this->categoryNodes->category' => $this->id]);
	}

	public function injectPostRepository(Ytnuk\Blog\Post\Repository $repository)
	{
		$this->postRepository = $repository;
	}
}
