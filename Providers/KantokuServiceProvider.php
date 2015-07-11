<?php
namespace App\Modules\Kantoku\Providers;

use Illuminate\Support\ServiceProvider;

use App;
use Config;
use Lang;
use Theme;
use View;


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

		$this->registerNamespaces();
		$this->registerProviders();
	}

	/**
	 * Register the Origami module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
//		Lang::addNamespace('kantoku', realpath(__DIR__.'/../Resources/Lang'));
		View::addNamespace('kantoku', realpath(__DIR__.'/../Resources/Views'));
	}

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../Config/kantoku.php' => config_path('kantoku.php'),
// 			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
// 			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
// 			__DIR__ . '/../Publish/views/plugins/' => base_path('resources/views/plugins/'),
		]);
/*
		$this->publishes([
			__DIR__ . '/../Publish/assets/vendors' => base_path('public/assets/vendors/'),
		], 'js');

		$this->publishes([
			__DIR__ . '/../Publish/Plugins' => base_path('app/Plugins/'),
		], 'plugins');
*/

		$this->publishes([
			__DIR__ . '/../Resources/Views/' => public_path('themes/') . Theme::getActive() . '/views/modules/kantoku/',
		], 'views');

/*
		AliasLoader::getInstance()->alias(
			'Setting',
			'anlutro\LaravelSettings\Facade'
		);
*/

	}


	/**
	* add Prvoiders
	*
	* @return void
	*/
	private function registerProviders()
	{
		$app = $this->app;

		$app->register('App\Modules\Kantoku\Providers\RouteServiceProvider');
// 		$app->register('App\Modules\Core\Providers\ViewComposerServiceProvider');
// 		$app->register('anlutro\LaravelSettings\ServiceProvider');
	}


}
