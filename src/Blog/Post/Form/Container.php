<?php
namespace Ytnuk\Blog\Post\Form;

use Nette;
use Nextras;
use Ytnuk;

final class Container
	extends Ytnuk\Orm\Form\Container
{

	/**
	 * @var Ytnuk\Blog\Post\Entity
	 */
	private $entity;

	/**
	 * @var Ytnuk\Blog\Post\Repository
	 */
	private $repository;

	public function __construct(
		Ytnuk\Blog\Post\Entity $entity,
		Ytnuk\Blog\Post\Repository $repository
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
		$link = $this->entity->link;
		$link->module = 'Blog:Post';
		$container = parent::setValues(
			$values,
			$erase
		);
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
		unset($this['link']);
	}

	protected function addPropertyDescription(Nextras\Orm\Entity\Reflection\PropertyMetadata $metadata)
	{
		return $this->addPropertyOneHasOneDirected(
			$metadata,
			TRUE
		);
	}
}
