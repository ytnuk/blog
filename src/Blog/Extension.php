<?php
namespace Ytnuk\Blog;

use Kdyby;
use Nette;
use Ytnuk;

final class Extension
	extends Nette\DI\CompilerExtension
	implements Ytnuk\Config\Provider
{

	public function getConfigResources() : array
	{
		return [
			Ytnuk\Orm\Extension::class => [
				'repositories' => [
					$this->prefix('categoryRepository') => Category\Repository::class,
					$this->prefix('categoryDescriptionRepository') => Category\Description\Repository::class,
					$this->prefix('postRepository') => Post\Repository::class,
					$this->prefix('postDescriptionRepository') => Post\Description\Repository::class,
					$this->prefix('postCategoryRepository') => Post\Category\Repository::class,
				],
			],
			Kdyby\Translation\DI\TranslationExtension::class => [
				'dirs' => [
					__DIR__ . '/../../locale',
				],
			],
			'services' => [
				Category\Control\Factory::class,
				Category\Form\Control\Factory::class,
				Post\Control\Factory::class,
				Post\Form\Control\Factory::class,
			],
		];
	}
}
