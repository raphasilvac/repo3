<?php


class AppController extends Controller
{
	public $components = array("Session", "Auth", "RequestHandler", "Navtop");
	
	
	public function beforeFilter()
	{
		$this->__setAuthSettings();
		$this->__setLayoutSettings();
		
		/** Load non default helpers */
		//	soh quero ver...
		$this->helpers[] = "HtmlExtend";
	}


	public function checkStatus()
	{	
		return Configure::read("app_status");
	}
}
