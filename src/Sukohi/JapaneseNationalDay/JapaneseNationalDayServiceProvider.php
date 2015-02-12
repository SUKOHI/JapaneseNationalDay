<?php namespace Sukohi\JapaneseNationalDay;

use Illuminate\Support\ServiceProvider;

class JapaneseNationalDayServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('sukohi/japanese-national-day');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['japanese-national-day'] = $this->app->share(function($app)
		{
			return new JapaneseNationalDay;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('japanese-national-day');
	}

}
