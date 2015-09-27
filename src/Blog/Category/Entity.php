<?php
namespace Ytnuk\Blog\Category;

use Nextras;
use Ytnuk;

/**
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Description\Entity|NULL $description {1:1d Description\Entity::$category}
 * @property Nextras\Orm\Relationships\OneHasOneDirected|Ytnuk\Menu\Entity $menu {1:1d Ytnuk\Menu\Entity::$category, primary=true}
 * @property Nextras\Orm\Relationships\OneHasMany|Ytnuk\Blog\Post\Category\Entity[] $postNodes {1:m Ytnuk\Blog\Post\Category\Entity::$category}
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
