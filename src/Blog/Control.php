<?php
namespace Ytnuk\Blog;

use Nette;
use Ytnuk;

final class Control
	extends Ytnuk\Application\Control
{

	/**
	 * @var Category\Control\Factory
	 */
	private $categoryControl;

	/**
	 * @var Post\Control\Factory
	 */
	private $postControl;

	/**
	 * @var Category\Entity
	 */
	private $category;

	/**
	 * @var Post\Entity
	 */
	private $post;

	public function __construct(
		Category\Control\Factory $categoryControl,
		Post\Control\Factory $postControl
	) {
		parent::__construct();
		$this->categoryControl = $categoryControl;
		$this->postControl = $postControl;
	}

	public function setCategory(Ytnuk\Blog\Category\Entity $category)
	{
		$this->category = $category;
		unset($this['category']);
	}

	public function setPost(Ytnuk\Blog\Post\Entity $post)
	{
		$this->post = $post;
		unset($this['post']);
	}

	protected function createComponentCategory() : Category\Control
	{
		return $this->categoryControl->create($this->category ? : new Category\Entity);
	}

	protected function createComponentPost() : Post\Control
	{
		return $this->postControl->create($this->post ? : new Post\Entity);
	}
}
