<?php
namespace Ytnuk\Blog;

use Kdyby;
use Nette;
use Ytnuk;

final class Extension
	extends Nette\DI\CompilerExtension
	implements Ytnuk\Orm\Provider, Kdyby\Translation\DI\ITranslationProvider
{

	public function loadConfiguration()
	{
		parent::loadConfiguration();
		$builder = $this->getContainerBuilder();
		$builder->addDefinition($this->prefix('control'))->setImplement(Control\Factory::class);
		$builder->addDefinition($this->prefix('category.control'))->setImplement(Category\Control\Factory::class);
		$builder->addDefinition($this->prefix('category.form.control'))->setImplement(Category\Form\Control\Factory::class);
		$builder->addDefinition($this->prefix('post.control'))->setImplement(Post\Control\Factory::class);
		$builder->addDefinition($this->prefix('post.form.control'))->setImplement(Post\Form\Control\Factory::class);
	}

	public function getTranslationResources() : array
	{
		return [
			__DIR__ . '/../../locale',
		];
	}

	public function getOrmResources() : array
	{
		return [
			'repositories' => [
				$this->prefix('categoryRepository') => Category\Repository::class,
				$this->prefix('categoryDescriptionRepository') => Category\Description\Repository::class,
				$this->prefix('postRepository') => Post\Repository::class,
				$this->prefix('postDescriptionRepository') => Post\Description\Repository::class,
				$this->prefix('postCategoryRepository') => Post\Category\Repository::class,
			],
		];
	}
}
