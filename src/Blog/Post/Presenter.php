<?php
namespace Ytnuk\Blog\Post;

use Nette;
use Ytnuk;

final class Presenter
	extends Ytnuk\Blog\Presenter
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
	private $post;

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
		if ( ! $this->post = $this->repository->getById($id)) {
			$this->error();
		}
		if ($category = $this->post->category) {
			$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = $category->menu;
		}
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = $this->post->title;
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->post = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = 'blog.post.presenter.action.edit';
	}

	public function redrawControl(
		string $snippet = NULL,
		bool $redraw = TRUE
	) {
		parent::redrawControl(
			$snippet,
			$redraw
		);
		if ($this->post) {
			$this[Control::class]->redrawControl();
		}
	}

	protected function createComponentYtnukBlogPostControl() : Control
	{
		return $this->control->create($this->post ? : new Entity);
	}
}
