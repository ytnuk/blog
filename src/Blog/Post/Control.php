<?php
namespace Ytnuk\Blog\Post;

use Ytnuk;

final class Control
	extends Ytnuk\Orm\Control
{

	/**
	 * @var Entity
	 */
	private $post;

	/**
	 * @var Form\Control\Factory
	 */
	private $formControl;

	/**
	 * @var Ytnuk\Orm\Grid\Control\Factory
	 */
	private $gridControl;

	/**
	 * @var Repository
	 */
	private $repository;

	public function __construct(
		Entity $post,
		Form\Control\Factory $formControl,
		Ytnuk\Orm\Grid\Control\Factory $gridControl,
		Repository $repository
	) {
		parent::__construct($post);
		$this->post = $post;
		$this->formControl = $formControl;
		$this->gridControl = $gridControl;
		$this->repository = $repository;
	}

	protected function startup() : array
	{
		return [
			'post' => $this->post,
		];
	}

	protected function getViews() : array
	{
		return [
			'view' => function () {
				return [
					$this->post,
				];
			},
			'card' => function () {
				return [
					$this->post,
				];
			},
		] + parent::getViews();
	}

	protected function createComponentForm() : Form\Control
	{
		return $this->formControl->create($this->post);
	}

	protected function createComponentGrid() : Ytnuk\Orm\Grid\Control
	{
		return $this->gridControl->create($this->repository);
	}
}
