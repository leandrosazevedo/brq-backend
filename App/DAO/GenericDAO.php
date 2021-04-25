<?php

namespace App\DAO;
use App\DAO\Conexao;
use App\Interface\CRUDInterface;

class GenericDAO extends Conexao implements CRUDInterface{

    public function __construct(){
        parent::__construct();
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