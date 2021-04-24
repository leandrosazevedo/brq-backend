<?php

namespace App\Controllers;

use App\DAO\PessoaDAO;
use App\Models\ResultModel;
use App\Models\PessoaModel;
use Slim\Http\Request;
use Slim\Http\Response;

final class PessoaController{

    public function getPessoas(Request $request, Response $response, array $args): Response{
        $resultModel = new ResultModel();
        try{
            $pessoaDAO = new PessoaDAO();
            $pessoas = $pessoaDAO->getAllPessoas();
            $response = $response->withJson($pessoas,200);
        } catch (\Exception $ex){
            $resultModel->setSuccess(false)
                        ->setUserMessage('Erro ao selecionar todas as Pessoas!')
                        ->setDevMessage($ex->getMessage())
                        ->setException($ex);
            $response = $response->withJson($resultModel->toArray(), 500); // INTERNAL SERVER ERROR
        }
        return $response;
    }

    public function getPessoaByID(Request $request, Response $response, array $args): Response{
        $resultModel = new ResultModel();
        try{
            $id = $args['id'];
            $pessoaDAO = new PessoaDAO();
            $pessoa = $pessoaDAO->getPessoaByID($id);

            if($pessoa === false){
                $resultModel->setSuccess(false)
                            ->setUserMessage('Pessoa não encontrada')
                            ->setDevMessage($pessoa)
                            ->setException('');
                
                $response = $response->withJson($resultModel->toArray(), 404); // NOT FOUND
            } else {
                $response = $response->withJson($pessoa,200);
            }
        } catch (\Exception $ex){
            $resultModel->setSuccess(false)
                        ->setUserMessage('Erro ao selecionar a Pessoa requisitada!')
                        ->setDevMessage($ex->getMessage())
                        ->setException($ex);

            $response = $response->withJson($resultModel->toArray(), 500); // INTERNAL SERVER ERROR
        }
        return $response;
    }

    public function inserirPessoa(Request $request, Response $response, array $args): Response{
        $resultModel = new ResultModel();
        try{
            $data = $request->getParsedBody();
            $nome = $data['nome'];
            $cpf = $data['cpf'];
            $email = $data['email'];
            $telefone = $data['telefone'];
            $sexo = $data['sexo'];
            $datanascimento = $data['datanascimento'];
            $pessoaModel = new PessoaModel();
            $pessoaModel->setNome($nome)
                        ->setCpf($cpf)
                        ->setEmail($email)
                        ->setTelefone($telefone)
                        ->setSexo($sexo)
                        ->setDatanascimento($datanascimento);
            $pessoaDAO = new PessoaDAO();
            $result = $pessoaDAO->insertPessoa($pessoaModel);
            if($result === true){
                $resultModel->setSuccess(true)
                            ->setUserMessage('Pessoa inserida com sucesso!')
                            ->setDevMessage($result);
                
                $response = $response->withJson($resultModel->toArray(), 201); // CREATED
            } else {
                throw new \Exception($result);
            }
        } catch (\Exception $ex){
            $resultModel->setSuccess(false)
                        ->setUserMessage('Erro ao inserir a Pessoa!')
                        ->setDevMessage($ex->getMessage())
                        ->setException($ex);

            $response = $response->withJson($resultModel->toArray(), 500);
        }
        return $response;
    }

    public function atualizarPessoa(Request $request, Response $response, array $args): Response{
        $resultModel = new ResultModel();
        try{
            $id = empty($args['id']) ? throw new \Exception('Parametro ID não informado') : $args['id'];
            $data = $request->getParsedBody();
            $nome = $data['nome'];
            $cpf = $data['cpf'];
            $email = $data['email'];
            $telefone = $data['telefone'];
            $sexo = $data['sexo'];
            $datanascimento = $data['datanascimento'];
            $pessoaModel = new PessoaModel();
            $pessoaModel->setNome($nome)
                        ->setCpf($cpf)
                        ->setEmail($email)
                        ->setTelefone($telefone)
                        ->setSexo($sexo)
                        ->setDatanascimento($datanascimento);
            $pessoaDAO = new PessoaDAO();
            $result = $pessoaDAO->updatePessoa($pessoaModel,$id);
            if($result === true){
                $resultModel->setSuccess(true)
                            ->setUserMessage('Pessoa atualizada com sucesso!')
                            ->setDevMessage($result);
                
                $response = $response->withJson($resultModel->toArray(), 200);
            } else {
                throw new \Exception($result);
            }
        } catch (\Exception $ex){
            $resultModel->setSuccess(false)
                        ->setUserMessage('Erro ao atualizar a Pessoa!')
                        ->setDevMessage($ex->getMessage())
                        ->setException($ex);

            $response = $response->withJson($resultModel->toArray(), 500);
        }
        return $response;
    }

    public function deletarPessoa(Request $request, Response $response, array $args): Response{
        $resultModel = new ResultModel();
        try{
            $id = empty($args['id']) ? throw new \Exception('Parametro ID não informado') : $args['id'];
            $pessoaDAO = new PessoaDAO();
            $result = $pessoaDAO->deletePessoa($id);
            if($result === true){
                $response = $response->withStatus(204); // No Content
            } else {
                throw new \Exception($result);
            }
        } catch (\Exception $ex){
            $resultModel->setSuccess(false)
                        ->setUserMessage('Erro ao deletar a Pessoa!')
                        ->setDevMessage($ex->getMessage())
                        ->setException($ex);
            $response = $response->withJson($resultModel->toArray(), 500);
        }
        return $response;
    }

}