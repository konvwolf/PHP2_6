<?php
$product_status = [
					0 => 'ПРИНЯТ',
					1 => 'ОБРАБОТАН',
					2 => 'ОТПРАВЛЕН'
				];
?>

<?php if ($registered === true): ?>
	Приветствуем, <?= $userName ?>!
	<br>
	Ваш порядковый номер в системе — <?= $userId ?>. Для входа на сайт вы используете логин <?= $userLogin ?>.
	<br>
	<?php if(!empty($isAdmin) && $isAdmin === true): ?>
		<span class="admin">Вы — администратор</span> :: 
		<u><a href="index.php?c=sales">перейти к управлению заказами</a></u>
	<?php endif; ?>
	<br>
	<br>
	<a href="index.php?c=users&act=logout" class="logout">Разлогиниться</a>
	<br>
	<br>
	<?php if(!empty($boughtList[0]['prod_id'])): ?>
            <table class="shopping_list">
                <tr>
					<?php if($isAdmin): ?>
						<th>
							Логин
						</th>
						<th>
							Статус
						</th>
					<?php endif; ?>
                    <th>
                        Дата покупки
                    </th>
                    <th>
                        Название товара
                    </th>
                    <th>
                        Цена
                    </th>
                    <th>
                        Количество
                    </th>
                    <th>
                        Общая стоимость
					</th>
                </tr>
                <?php foreach($boughtList as $goods): ?>
                    <tr>
						<?php if($isAdmin): ?>
							<td>
								<b><?= $goods['login'] ?></b>
							</td>
							<td>
								<i><?= $product_status[$goods['status']] ?></i>
							</td>
						<?php endif; ?>
                        <td>
                            <?= $goods['shopping_date'] ?>
                        </td>
                        <td>
                            <?= $goods['prod_name'] ?>
                        </td>
                        <td>
							<?= $goods['prod_price'] ?>
                        </td>
                        <td>
							<?= $goods['quantity'] ?>
                        </td>
                        <td>
							<?= $goods['prod_price'] * $goods['quantity'] ?>
						</td>
                    </tr>
				<?php endforeach; ?>
            </table>
	<?php endif; ?>
<?php else: ?>
	<?= 'Залогиньтесь или зарегистрируйтесь' ?>
<?php endif; ?>