<?php
namespace Ytnuk\Blog\Post;

use Nextras;
use Ytnuk;

final class Repository
	extends Ytnuk\Orm\Repository
{

	public function findAll() : Nextras\Orm\Collection\ICollection
	{
		return parent::findAll()->orderBy(
			current($this->getEntityMetadata()->getPrimaryKey()),
			Nextras\Orm\Collection\ICollection::DESC
		);
	}

	public static function getEntityClassNames() : array
	{
		return [
			Entity::class,
		];
	}
}
