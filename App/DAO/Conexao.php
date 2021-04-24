<?php

namespace App\DAO;

abstract class Conexao {

    protected $pdo;

    public function __construct(){
        $host = DB_HOST;
        $port = DB_PORT;
        $user = DB_USER;
        $pass = DB_PASSWORD;
        $db = DB_NAME;

        $dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';port=' . $port;
        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }

}