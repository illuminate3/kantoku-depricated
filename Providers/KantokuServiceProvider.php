<?php
namespace App\Modules\Kantoku\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class KantokuServiceProvider extends ServiceProvider
{
	/**
	 * Register the Kantoku module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Kantoku\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Kantoku module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('kantoku', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('kantoku', realpath(__DIR__.'/../Resources/Views'));
	}
}
