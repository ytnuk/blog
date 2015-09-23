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
			$this[Ytnuk\Web\Control::NAME][Ytnuk\Menu\Control::NAME][] = $category->menu;
		}
		$this[Ytnuk\Web\Control::NAME][Ytnuk\Menu\Control::NAME][] = $this->post->title;
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->post = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this[Ytnuk\Web\Control::NAME][Ytnuk\Menu\Control::NAME][] = 'blog.post.presenter.action.edit';
	}

	protected function createComponentBlog() : Ytnuk\Blog\Control
	{
		$blog = parent::createComponentBlog();
		if ($this->post) {
			$blog->setPost($this->post);
		}

		return $blog;
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
			$this[Ytnuk\Blog\Control::NAME][Control::NAME]->redrawControl();
		}
	}
}
