<?php
class C_Sales extends C_Base {
    function action_index() {
        if(!empty($_SESSION['registered']) && $_SESSION['registered'] == $this->login && $_SESSION['admin'] === true) {
            $query = DB::selectDB('SELECT c.id, c.status, c.shopping_date, c.login, c.prod_name, c.quantity, c.prod_id, c.status, p.prod_price 
                                    FROM '.CART.' as c 
                                    LEFT JOIN '.PRODUCTS.' p ON c.prod_id = p.id 
                                    ORDER BY c.shopping_date DESC, c.status');
            $this->title .= ' :: Управление заказами';
            $this->content = $this->Template('v/v_sales.php', ['list' => $query]);
        }

        if($this->IsPost() && isset($_POST['change_status'])) {
            DB::InsUpdDelDB('UPDATE '.CART.' SET status = \''.$_POST['change_status'].'\' WHERE id = \''.$_POST['prod_id'].'\'');
        }
    }
}