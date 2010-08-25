<?php


class AppController extends Controller
{
	public $components = array("Session", "Auth", "RequestHandler", "Navtop");
	
	
	public function beforeFilter()
	{
		$this->__setAuthSettings();
		$this->__setLayoutSettings();
		
		/** Load non default helpers */
		$this->helpers[] = "HtmlExtendBest";
	}


	public function checkStatus()
	{	
		return Configure::read("app_status");
	}


	public function isAdmin()
	{
		return $this->Auth->user("admin");
	}
}
