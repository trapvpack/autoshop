<?php

class SingletonConnection {

    private static $instance;

    private function __construct() { }

    private static function getInstance() {
        if (null == SingletonConnection::$instance) {
            $cname = __CLASS__;
            SingletonConnection::$instance = new $cname;
        }
        return SingletonConnection::$instance;
    }

    /**
     * @throws Exception when trying to create a copy.
     */
    public function __clone(): void
    {
        throw new Exception('Unable to create copy of object.');
    }

    public static function connection(): PDO {
        try {
            return new PDO('mysql:host=localhost;dbname=autoshop', 'root', '');
        } catch (PDOException $ex) {
            // avoiding to exception swallowing.
            echo 'Unable to get connection with database';
            throw new $ex;
        }
    }
}