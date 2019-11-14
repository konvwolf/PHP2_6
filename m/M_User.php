<?php
class M_User {
    private $sql;

    function __construct() {
        $this->sql = DB::makeConnect();
    }

    function userRegister($name, $login, $email, $password) {
        $query = DB::InsUpdDelDB('INSERT INTO '.USERS.' (name, login, email, password) VALUES (\''.$name.'\', \''.$login.'\', \''.$email.'\', \''.password_hash($password, PASSWORD_DEFAULT).'\')');
        if ($query != 0) {
            return true;
        }
    }

    function userLogin($login) {
        $pass = DB::selectDB('SELECT password, admin FROM '.USERS.' WHERE login=\''.$login.'\'');
        if (password_verify ($_POST['password'], $pass[0]['password'])) {
            if ($pass[0]['admin']) {
                return 'admin';
            } else {
                return 'user';
            }
        }
    }
}