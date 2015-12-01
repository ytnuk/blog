<?php
namespace Ytnuk\Blog\Post;

use Nette;
use Ytnuk;

final class Presenter
	extends Ytnuk\Blog\Application\Presenter
{

	/**
	 * @var Repository
	 */
	private $repository;

	/**
	 * @var Control\Factory
	 */
	private $control;

	/**
	 * @var Entity
	 */
	private $entity;

	public function __construct(
		Repository $repository,
		Control\Factory $control
	) {
		parent::__construct();
		$this->repository = $repository;
		$this->control = $control;
	}

	public function actionView(int $id)
	{
		if ( ! $this->entity = $this->repository->getById($id)) {
			$this->error();
		}
		if ($category = $this->entity->category) {
			$this['web']['menu'][] = $category->menu;
		}
		$this['web']['menu'][] = $this->entity->title;
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->entity = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this['web']['menu'][] = 'blog.post.presenter.action.edit';
	}

	protected function createComponentBlog() : Ytnuk\Blog\Control
	{
		$blog = parent::createComponentBlog();
		if ($this->entity) {
			$blog->setPost($this->entity);
		}

		return $blog;
	}
}
