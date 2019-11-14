<?php
session_start();
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller {
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
	protected $login;
	private $sql;

	function __construct() {
		$this->sql = DB::makeConnect();
	}
	
	protected function before()
	{
		$this->title = 'Все для мира';
		$this->content = '';
		$this->login = $_SESSION['registered'];
	}
	
	//
	// Генерация базового шаблона
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content, 'login' => $this->login);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
