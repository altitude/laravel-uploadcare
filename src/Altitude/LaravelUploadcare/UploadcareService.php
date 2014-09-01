<?php namespace Altitude\LaravelUploadcare;

use \Uploadcare\Api as Api;

class UploadcareService extends Api {

	public function __construct($public, $private){
		parent::__construct($public, $private);
	}
	
	/**
	* Returns <script> sections to include Uploadcare widget
	*
	* @param string $version Uploadcare version
	* @param boolean $async
	* @return string
	*/
	public function scriptTag($version = null, $async = false){
		return $this->widget->getScriptTag($version, $async);
	}

}