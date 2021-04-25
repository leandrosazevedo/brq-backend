<?php

use function src\slimConfiguration;

use App\Controllers\PessoaController;
use App\Controllers\ProdutoController;

$app = new \Slim\App(slimConfiguration());

// CONSULTAR
$app->get('/pessoa', PessoaController::class . ':getPessoas');
$app->get('/pessoa/{id}', PessoaController::class . ':getPessoaByID');

// INSERIR
$app->post('/pessoa', PessoaController::class . ':inserirPessoa');

// ATUALIZAR
$app->put('/pessoa/{id}', PessoaController::class . ':atualizarPessoa');

// DELETAR
$app->delete('/pessoa/{id}', PessoaController::class . ':deletarPessoa');

$app->run();