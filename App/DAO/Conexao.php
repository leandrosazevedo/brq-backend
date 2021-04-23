<?php

namespace App\DAO;

use Exception;

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

    public function select(string $query, array $values, $selectOne = false){
        try{
            $stmt = $this->pdo->prepare($query);
            if(count($values) > 0){
                foreach ($values as $key => $value){
                    $stmt->bindParam($key, $value);
                }
            }
            $stmt->execute();
            $result = $selectOne ? $stmt->fetch(\PDO::FETCH_ASSOC) : $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $ex){
            return 'Error: ' . $ex->getMessage();
        }
    }

    public function insert(string $query, array $values = array()){
        try{
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute($values);
            if(!$result){
                return throw new \Exception("Erro ao inserir: " . $stmt->errorInfo());
            } else {
                return $result;
            }
        } catch (\Exception $ex){
            return  'Error: ' . $ex->getMessage();
        }
    }

    public function update(string $query, array $values = array()){
        try{
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute($values);
            if(!$result){
                return throw new \Exception("Erro ao atualizar: " . $stmt->errorInfo());
            } else {
                return $result;
            }
        } catch (\Exception $ex){
            return  'Error: ' . $ex->getMessage();
        }
    }

    public function delete(string $query, array $values = array()){
        try{
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute($values);
            if(!$result){
                return throw new \Exception("Erro ao deletar: " . $stmt->errorInfo());
            } else {
                return $result;
            }
        } catch (\Exception $ex){
            return  'Error: ' . $ex->getMessage();
        }
    }

}