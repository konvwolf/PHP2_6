<?php
include_once('config/config.php');
spl_autoload_register (function ($class) { include "c/$class.php"; });

$action = 'action_';
$action .= (isset($_GET['act'])) ? $_GET['act'] : 'index';

print_r($link);
switch ($_GET['c'])
{
	case 'users':
		$controller = new C_User();
		break;
	case 'sales':
		$controller = new C_Sales();
		break;
	default:
		$controller = new C_Page();
}

$controller->Request($action);