<?php
namespace Ytnuk\Blog\Category;

use Nette;
use Ytnuk;

final class Control
	extends Ytnuk\Orm\Control
{

	const NAME = 'category';

	/**
	 * @var Entity
	 */
	private $category;

	/**
	 * @var Form\Control\Factory
	 */
	private $formControl;

	/**
	 * @var Ytnuk\Orm\Grid\Control\Factory
	 */
	private $gridControl;

	/**
	 * @var Ytnuk\Blog\Post\Control\Factory
	 */
	private $postControl;

	/**
	 * @var Ytnuk\Blog\Post\Repository
	 */
	private $postRepository;

	/**
	 * @var Repository
	 */
	private $repository;

	public function __construct(
		Entity $category,
		Repository $repository,
		Form\Control\Factory $formControl,
		Ytnuk\Orm\Grid\Control\Factory $gridControl,
		Ytnuk\Blog\Post\Control\Factory $postControl,
		Ytnuk\Blog\Post\Repository $postRepository
	) {
		parent::__construct($category);
		$this->category = $category;
		$this->repository = $repository;
		$this->formControl = $formControl;
		$this->gridControl = $gridControl;
		$this->postControl = $postControl;
		$this->postRepository = $postRepository;
	}

	protected function startup() : array
	{
		return [
			'category' => $this->category,
		];
	}

	protected function renderView() : array
	{
		return [
			'posts' => $this[Ytnuk\Orm\Pagination\Control::NAME]['posts'],
		];
	}

	protected function getViews() : array
	{
		return [
			'view' => function () {
				return [
					$this->category,
					$this[Ytnuk\Orm\Pagination\Control::NAME]['posts'],
				];
			},
		] + parent::getViews();
	}

	protected function createComponentForm() : Form\Control
	{
		return $this->formControl->create($this->category);
	}

	protected function createComponentGrid() : Ytnuk\Orm\Grid\Control
	{
		return $this->gridControl->create($this->repository);
	}

	protected function createComponentPost() : Nette\Application\UI\Multiplier
	{
		return new Nette\Application\UI\Multiplier(
			function ($id) : Ytnuk\Blog\Post\Control {
				$post = $this->postRepository->getById($id);
				if ($post instanceof Ytnuk\Blog\Post\Entity) {
					return $this->postControl->create($post);
				}

				return NULL;
			}
		);
	}
}
