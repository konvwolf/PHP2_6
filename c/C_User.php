<?php
//
// Конттроллер страницы чтения.
//
session_start();
include_once('m/M_User.php');

class C_User extends C_Base
{
	private $user;
	function __construct() {
		$this->user = new M_User();
	}
	
	function action_index() {
		if ($this->IsGet() && $_GET['user'] === $_SESSION['registered']) {
			$registered = true;
			if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
				$queryUser = DB::selectDB('SELECT id, login, name FROM '.USERS.' WHERE login = \''.$_GET['user'].'\'');
				$queryGoods = DB::selectDB('SELECT c.shopping_date, c.login, c.prod_name, c.quantity, c.prod_id, c.status, p.prod_price 
												FROM '.CART.' as c 
												LEFT JOIN '.PRODUCTS.' p ON c.prod_id = p.id 
												ORDER BY c.shopping_date DESC, c.login
												LIMIT 10');
				$this->content = $this->Template('v/v_user.php', [
																	'registered'	=>	$registered,
																	'userName'      =>  $queryUser[0]['name'],
																	'userId'        =>  $queryUser[0]['id'],
																	'userLogin'		=> 	$queryUser[0]['login'],
																	'isAdmin'		=>	$_SESSION['admin'],
																	'boughtList'    =>  $queryGoods
																]);
			} else {
				$queryUser = DB::selectDB('SELECT u.id, u.login, u.name, u.admin, c.shopping_date, c.prod_id, c.prod_name, c.quantity, p.prod_price 
											FROM '.USERS.' u 
											LEFT JOIN '.CART.' c ON u.login = c.login 
											LEFT JOIN '.PRODUCTS.' p ON c.prod_id = p.id 
											WHERE u.login = \''.$_GET['user'].'\' 
											ORDER BY c.shopping_date DESC');
				$this->content = $this->Template('v/v_user.php', [
																	'registered'	=>	$registered,
																	'userName'      =>  $queryUser[0]['name'],
																	'userId'        =>  $queryUser[0]['id'],
																	'userLogin'		=> 	$queryUser[0]['login'],
																	'isAdmin'		=>	$_SESSION['admin'],
																	'boughtList'    =>  $queryUser
																]);
			}
		} else {
			$this->content = $this->Template('v/v_register.php');
		}
	}

	function action_register() {
		if($this->IsPost()) {
			$register = $this->user->userRegister($_POST['name'], $_POST['login'], $_POST['email'], $_POST['password']);
			if ($register === true) {
				$_SESSION['registered'] = $_POST['login'];
				header('location: index.php?c=users&user='.$_POST['login']);
			}
		}
		$this->content = $this->Template('v/v_register.php');
	}

	function action_login() {
		if($this->IsPost()) {
			$login = $this->user->userLogin($_POST['login'], $_POST['password']);
			if (!empty($login)) {
				switch ($login) {
					case 'admin':
						$_SESSION['registered'] = $_POST['login'];
						$_SESSION['admin'] = true;
						header('location: index.php?c=users&user='.$_POST['login']);
						break;
					default:
						$_SESSION['registered'] = $_POST['login'];
						header('location: index.php?c=users&user='.$_POST['login']);
				}
			} else {
				header('location: index.php?c=users&act=register');
			}
		}
		$this->content = $this->Template('v/v_login.php');
	}

	function action_logout() {
		session_destroy();
		header('location: /');
	}
}