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
	
	
	public function beforeRender()
	{
		$this->set("topics", $this->Navtop->buildAdminMenu());
	}
	
	
	/**
	 * Definindo configura��es para AuthComponent
	 * @return void
	 */
	
	protected function __setAuthSettings()
	{
		Security::setHash("md5");	// Utilizando md5 para compatibilidade com banco ACESSO.GDB
		
		$authSettings = array(
			"userModel" => "AcessoLogin",
			"loginAction" => array("admin" => false, "controller" => "acesso_logins", "action" => "login"),
			"fields" => array("username" => "login_login", "password" => "login_senha"),
			"loginError" => "Usu�rio e/ou senha incorretos",
			"authError" => "Voc� precisa efetuar login e ter permiss�es suficientes para visitar esse local",
			"autoRedirect" => false,
			"loginRedirect" => "/",
			"logoutRedirect" => "/"
		);
		
		foreach ($authSettings as $setting => $value){
			$this->Auth->{$setting} = $value;
		}
	}
	
	
	/**
	 * 
	 * Settings for appearance
	 */
	
	protected function __setLayoutSettings()
	{
        $this->view = "Theme";
        $this->theme = "green";
        $this->layout = "simple";
	}
	
	
	/**
	 * 
	 * Verifica se o usu�rio no caso de estar autenticado � um administrador
	 */
	
	public function isAdmin()
	{
		return strtolower($this->Auth->user("login_admin")) == "s";
	}
}