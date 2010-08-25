<?php


class AppController extends Controller
{
	public $components = array("Session", "Auth", "RequestHandler", "Navtop");
	
	
	public function beforeFilter()
	{
		$this->__setAuthSettings();
		$this->__setLayoutSettings();
		
		/** Load non default helpers */
		$this->helpers[] = "HtmlExtend";
	}
}
