<?php namespace Altitude\LaravelUploadcare;

use Illuminate\Support\ServiceProvider;
use \Config;
use \Uploadcare;

class LaravelUploadcareServiceProvider extends ServiceProvider {

	/**
	* Indicates if loading of the provider is deferred.
	*
	* @var bool
	*/
	protected $defer = false;

	/**
	* Register custom form macros on package start
	* @return void
	*/
	public function boot()
	{
		$this->app['form']->macro('uploadcare', function($name, $value=null, $options=array()){
			
			$options = array_merge($options, array(
				'role'  => 'uploadcare-uploader',
				'value' => $value,
			));
			
			return $this->input('hidden', $name, $value, $options);
		});
	}

	/**
	* Register the service provider.
	*
	* @return void
	*/
	public function register()
	{
		$this->app->singleton('uploadcare', function(){
			
			$public  = Config::get('uploadcare.public_key');
			$private = Config::get('uploadcare.private_key');
			
			return new UploadcareService($public, $private);
		});
	}

	/**
	* Get the services provided by the provider.
	*
	* @return array
	*/
	public function provides()
	{
		return array('uploadcare');
	}

}
