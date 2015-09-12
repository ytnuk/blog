<?php
namespace Ytnuk\Blog\Category;

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
	private $category;

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
		if ( ! $this->category = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function actionEdit(int $id)
	{
		if ( ! $this->category = $this->repository->getById($id)) {
			$this->error();
		}
	}

	public function renderEdit()
	{
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class][] = 'blog.category.presenter.action.edit';
	}

	public function redrawControl(
		string $snippet = NULL,
		bool $redraw = TRUE
	) {
		parent::redrawControl(
			$snippet,
			$redraw
		);
		if ($this->category) {
			$this[Control::class]->redrawControl();
		}
	}

	protected function createComponentYtnukBlogCategoryControl() : Control
	{
		return $this->control->create($this->category ? : new Entity);
	}
}
