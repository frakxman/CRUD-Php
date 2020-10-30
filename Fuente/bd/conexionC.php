<?php

class ConexionC {

    public static function conectarC () {
        define('server', 'localhost');
        define('name_bd', 'contactsdb');
        define('user', 'root');
        define('password', '');

        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $conection = new PDO("mysql:host=" . server . "; dbname=" . name_bd, user, password, $options);
            return $conection;
        } catch ( Exception $e ) {
            die("El error de conexiñon es: " . $e->getMessage());
        }

    }
}

