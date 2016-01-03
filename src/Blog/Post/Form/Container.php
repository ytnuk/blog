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
		parent::__construct($entity, $repository);
		$this->entity = $entity;
		$this->repository = $repository;
	}

	protected function attached($form)
	{
		parent::attached($form);
		unset($this['link']);
	}

	public function setValues(
		$values,
		$erase = FALSE
	) : Ytnuk\Orm\Form\Container
	{
		$container = parent::setValues($values, $erase);
		$link = $this->entity->link;
		$link->module = 'Blog:Post';
		if ( ! $link->parameters->get()->getBy(['key' => $key = current($this->repository->getEntityMetadata()->getPrimaryKey())])) {
			$linkParameter = new Ytnuk\Link\Parameter\Entity;
			$linkParameter->key = $key;
			$linkParameter->value = $this->entity->getPersistedId() ? : $this->repository->persist($this->entity)->getPersistedId();
			$link->parameters->add($linkParameter);
		}

		return $container;
	}

	protected function createComponentDescription(Nextras\Orm\Entity\Reflection\PropertyMetadata $metadata)
	{
		return $this->createComponentOneHasOne($metadata, TRUE);
	}
}
