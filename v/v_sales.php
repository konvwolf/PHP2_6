<?php
$product_status = [
					0 => 'ПРИНЯТ',
					1 => 'ОБРАБОТАН',
					2 => 'ОТПРАВЛЕН'
				];
?>

<table class="shopping_list">
    <tr>
        <th>
            Логин
        </th>
        <th>
            Статус
        </th>
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
    <?php foreach($list as $goods): ?>
        <tr>
            <td>
                <b><?= $goods['login'] ?></b>
            </td>
            <td>
                <select class="change_status" data-id="<?= $goods['id'] ?>">
                    <?php foreach($product_status as $key => $val): ?>
                        <?php if($key == $goods['status']): ?>
                            <option value="<?= $key ?>" selected="selected"><?= $val ?></option>
                        <?php else: ?>
                            <option value="<?= $key ?>"><?= $val ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </td>
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