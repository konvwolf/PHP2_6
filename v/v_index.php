<?php if (isset($prodList)): ?>
    <section class="products_list">
    <?php foreach ($prodList as $prods): ?>
        <div class="product_card" data-id="<?= $prods['id'] ?>">
            <a href="index.php?c=page&productID=<?= $prods['id'] ?>" class="product_link">
                <img src="public/img/<?= $prods['file_name'] ?>" alt="<?= $prods['image_name'] ?>">
                <h2 class="product_name"><?= $prods['prod_name'] ?></h2>
                <i class="fas fa-ruble-sign"></i> <span class="product_price"><?= $prods['prod_price'] ?></span>
                <a class="to_cart"><i class="fas fa-shopping-basket"></i></a>
            </a>
        </div>
    <?php endforeach; ?>
    </section>
<?php else: ?>
    <section class="product_description">
        <div class="product_images">
            <?php foreach($prodPics as $file => $name): ?>
                <img src="/public/img/<?= $file ?>" alt="<?= $name ?>"
                    onmouseover="this.style='transform: scale(1.1);'"
                    onmouseout="this.style='transform: scale(1)'">
            <?php endforeach; ?>
        </div>
    <div class="full_description" data-id="<?= $prodDescr[0]['id'] ?>">
            <h2 class="product_name"><?= $prodDescr[0]['prod_name'] ?></h2>
            <ul class="product_characteristics">
                <?php foreach ((array) json_decode($prodDescr[0]['prod_desc']) as $key => $val): ?>
                    <li>
                        <b><?= $key ?></b>: <?= $val ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <i class="fas fa-ruble-sign"></i> <span class="product_price product_descr_price"><?= $prodDescr[0]['prod_price'] ?></span>
            <a class="to_cart"><i class="fas fa-shopping-basket"></i></a>
        </div>
    </section>
<?php endif; ?>