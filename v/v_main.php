<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
		<div class="cart">
            <button class="btn_cart" type="button">Корзина</button>
            <div class="cart_block invisible"></div>
    	</div>
	</div>
	
	<div id="menu">
		| <a href="/">Главная</a> |
		<?php if ($_SESSION['registered']): ?>
			<a href="index.php?c=users&user=<?= $login ?>">Личный кабинет</a> |
		<?php else: ?>
			<a href="index.php?c=users&act=register">Зарегистрироваться</a> |
			<a href="index.php?c=users&act=login">Залогиниться</a> |
		<?php endif; ?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
	<script src="/public/js/cart.js"></script>
	<script src="/public/js/sales.js"></script>
</body>
</html>
