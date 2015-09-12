<?php
namespace Ytnuk\Blog\Category\Form;

use Nette;
use Nextras;
use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	/**
	 * @var Ytnuk\Blog\Category\Entity
	 */
	private $entity;

	/**
	 * @var Ytnuk\Blog\Category\Repository
	 */
	private $repository;

	public function __construct(
		Ytnuk\Blog\Category\Entity $entity,
		Ytnuk\Blog\Category\Repository $repository
	) {
		parent::__construct(
			$entity,
			$repository
		);
		$this->entity = $entity;
		$this->repository = $repository;
	}

	public function setValues(
		$values,
		$erase = FALSE
	) : Ytnuk\Orm\Form\Container
	{
		$container = parent::setValues(
			$values,
			$erase
		);
		$link = $this->entity->menu->link;
		$link->module = 'Blog:Category';
		if ( ! $link->parameters->get()->getBy(['key' => 'id'])) {
			$linkParameter = new Ytnuk\Link\Parameter\Entity;
			$linkParameter->key = 'id';
			$linkParameter->value = $this->entity->getPersistedId() ? : $this->repository->persist(
				$this->entity
			)->getPersistedId();
			$link->parameters->add($linkParameter);
		}

		return $container;
	}

	protected function attached($form)
	{
		parent::attached($form);
		unset($this['menu']['link']);
	}

	protected function addPropertyDescription(Nextras\Orm\Entity\Reflection\PropertyMetadata $metadata)
	{
		return $this->addPropertyOneHasOneDirected(
			$metadata,
			TRUE
		);
	}
}
