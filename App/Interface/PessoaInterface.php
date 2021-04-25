<?php

namespace App\Interface;

use App\Models\PessoaModel;

interface PessoaInterface {

    public function getAllPessoas();
    
    public function insertPessoa(PessoaModel $pessoa);

    public function updatePessoa(PessoaModel $pessoa, int $id);

    public function deletePessoa(int $id);

}