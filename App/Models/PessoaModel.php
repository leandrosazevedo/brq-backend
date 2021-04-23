<?php

namespace App\Models;

final class PessoaModel{

    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $sexo;
    private $datanascimento;

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getCpf(): string{
        return $this->cpf;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getTelefone(): string{
        return $this->telefone;
    }

    public function getSexo(): string{
        return $this->sexo;
    }

    public function getDatanascimento(): string{
        return $this->datanascimento;
    }

    public function setNome(string $nome): PessoaModel{ // retorna ele mesmo, método encadeado
        $this->nome = $nome;
        return $this;
    }

    public function setCpf(string $cpf): PessoaModel{
        $this->cpf = $cpf;
        return $this;
    }

    public function setEmail(string $email): PessoaModel{
        $this->email = $email;
        return $this;
    }

    public function setTelefone(string $telefone): PessoaModel{
        $this->telefone = $telefone;
        return $this;
    }

    public function setSexo(string $sexo): PessoaModel{
        $this->sexo = $sexo;
        return $this;
    }

    public function setDatanascimento(string $datanascimento): PessoaModel{
        $this->datanascimento = $datanascimento;
        return $this;
    }


}