<?php namespace Fungku\HubSpot;

use Fungku\HubSpot;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class HubSpotServiceProvider extends ServiceProvider {

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
		//Log::info(__DIR__);
        //$this->package('fungku/hubspot');
		//$this->package('fungku/laravel-hubspot');
		$this->publishes([
			__DIR__.'/../../config/hubspot.php' => config_path('hubspot.php')
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('hubspot', function ($app) {		
			return new HubSpot(
                Config::get('hubspot.key'),
                Config::get('hubspot.useragent')
            );
	   });	   

        //Shortcut so developers don't need to add an Alias in app/config/app.php
        // $this->app->booting(function()
        // {
        //     $loader = AliasLoader::getInstance();
        //     $loader->alias('HubSpot', 'Fungku\HubSpot\Facades\HubSpot');
        // });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('hubspot');
	}

}
