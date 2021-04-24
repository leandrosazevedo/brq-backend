<?php

namespace App\DAO;

use App\Models\PessoaModel;

class PessoaDAO extends GenericDAO{

    public function getAllPessoas(){
        return $this->select('SELECT * FROM pessoa;',[]);
    }

    public function getPessoaByID($id){
        return $this->select('SELECT * FROM pessoa where id = :id;',[
            'id' => $id
        ],true);
    }

    public function insertPessoa(PessoaModel $pessoa){
        $sql = 'INSERT INTO pessoa VALUES (
            null,
            :nome,
            :cpf,
            :email,
            :telefone,
            :sexo,
            :datanascimento
        );';
        $values = [
            'nome' => $pessoa->getNome(),
            'cpf' => $pessoa->getCpf(),
            'email' => $pessoa->getEmail(),
            'telefone' => $pessoa->getTelefone(),
            'sexo' => $pessoa->getSexo(),
            'datanascimento' => $pessoa->getDatanascimento()
        ];
        return $this->insert($sql,$values);
    }

    public function updatePessoa(PessoaModel $pessoa, int $id){
        $sql = 'UPDATE pessoa SET
            nome = :nome,
            cpf = :cpf,
            email = :email,
            telefone = :telefone,
            sexo = :sexo,
            datanascimento = :datanascimento
            WHERE id = :id;';
        $values = [
            'id' => $id,
            'nome' => $pessoa->getNome(),
            'cpf' => $pessoa->getCpf(),
            'email' => $pessoa->getEmail(),
            'telefone' => $pessoa->getTelefone(),
            'sexo' => $pessoa->getSexo(),
            'datanascimento' => $pessoa->getDatanascimento()
        ];
        return $this->update($sql,$values);
    }

    public function deletePessoa(int $id){
        $sql = 'DELETE FROM pessoa
            WHERE id = :id;';
        $values = [
            'id' => $id
        ];
        return $this->delete($sql,$values);
    }
}