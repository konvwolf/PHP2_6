<?php
include_once('config/config.php');

class DB {
    private static $connect;
    private function __construct() {}

    public static function makeConnect() {
        if(self::$connect==null) {
            $connect_str = DRIVER . ':host='. SITE . ';dbname=' . DATABASE;
            self::$connect = new PDO($connect_str, ADMIN, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return self::$connect;
    }

    public static function DBQuery($query) {
        $result = self::$connect->prepare($query);
        $result->execute();
        return $result;
    }

    public static function selectDB($query) {
        return self::DBQuery($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function InsUpdDelDB($query) {
        return self::DBQuery($query)->rowCount();
    }
}