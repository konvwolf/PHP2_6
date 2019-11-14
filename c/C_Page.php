<?php
//
// Конттроллер страницы чтения.
//
class C_Page extends C_Base {
	public function action_index(){
		setcookie("registered", $_POST['login'], time()+86400);
		if(isset($_GET['productID']) && !empty($_GET['productID']) && $this->IsGet()) {
			$productsDescr = DB::selectDB('SELECT '.PRODUCTS.'.id, prod_brand, prod_name, prod_desc, prod_price, '.PHOTOS.'.file_name, '.PHOTOS.'.image_name 
											FROM '.PRODUCTS.' 
											JOIN '.PHOTOS.' ON '.PRODUCTS.'.id = '.PHOTOS.'.prod_id AND '.PRODUCTS.'.id = \''.$_GET['productID'].'\'');
			$productsPics = [];
			foreach($productsDescr as $val) {
				$productsPics[$val['file_name']] = $val['image_name'];
			}
			$this->title .= ' :: "'.$productsDescr[0]['prod_brand'].'"';
			$this->content = $this->Template('v/v_index.php', ['prodDescr' => $productsDescr, 'prodPics' => $productsPics]);
		} else {
			$this->title .= ' :: Наши товары';
			$productsList = DB::selectDB('SELECT '.PRODUCTS . '.id, prod_name, prod_price, prod_hurl, '.PHOTOS.'.file_name, '.PHOTOS.'.image_name 
											FROM '.PRODUCTS.' JOIN '.PHOTOS.' ON '.PRODUCTS.'.id = '.PHOTOS.'.prod_id 
											GROUP BY '.PRODUCTS.'.id 
											ORDER BY '.PRODUCTS.'.id');
			$this->content = $this->Template('v/v_index.php', ['prodList' => $productsList]);
		}

		if($this->IsPost() && isset($_POST['cartContents'])) {
			$postArr = (array) json_decode($_POST['cartContents']);
			foreach ($postArr as $place) {
			$id = $place->id;
			$name = $place->name;
			$quantity = $place->quantity;
			$login = $this->login;
			DB::InsUpdDelDB('INSERT INTO '.CART.' (login, prod_id, prod_name, quantity) 
								VALUES (\''.$login.'\', \''.$id.'\', \''.$name.'\', \''.$quantity.'\')');
			}
		}
	}
}