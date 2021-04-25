# Brq Back End
Este projeto foi feito em `PHP` com o `Slim Framework`

## Servidor de desenvolvimento

- Para rodar, basta estar em um servidor php.
- No terminal, executar o comando `composer install` para instalar as dependencias do projeto.

## Configurações básicas

Acesso o arquivo `./util/db.sql` para obter o código de criação do Banco de dados, e da tabela.

Acesse o arquivo `./env.php` e modifique as constantes listadas abaixo para o sistema se conectar ao banco Mysql:
- `DB_HOST` => Host do Banco de Dados
- `DB_NAME` => Nome do Banco de Dados
- `DB_USER` => Usuário do Banco de Dados
- `DB_PASSWORD` => Senha do Banco de Dados
- `DB_PORT` => Porta do Banco de Dados (Padrão do Mysql: 3306)

No arquivo `./util/BRQ.postman_collection.json` existe um exemplo de cada chamada disponibilizada no padrão do `Postman`.


## CONSULTAS

## Retorna todas as pessoas
```
Method: GET
{BASEURI}/pessoa
```

## Retorna uma pessoa específica
```
Method: GET
{BASEURI}/pessoa/{id}
```

## Cria uma pessoa
```
Method: POST
{BASEURI}/pessoa
Header
(Content-Type: application/json)
Body
{
    "nome" : "LEANDRO SOUSA AZEBEDO",
    "cpf" : "12345678906",
    "email" : "lazevedo@gmail.com",
    "telefone" : "(22) 000000000",
    "sexo" : "M",
    "datanascimento" : "1987-07-05"
}
```

## Atualiza uma pessoa
```
Method: PUT
{BASEURI}/pessoa/{id}
Header
(Content-Type: application/json)
Body
{
    "nome" : "LEANDRO SOUSA AZEBEDO",
    "cpf" : "12345678906",
    "email" : "lazevedo@gmail.com",
    "telefone" : "(22) 000000000",
    "sexo" : "M",
    "datanascimento" : "1987-07-05"
}
```

## Deleta uma pessoa
```
Method: DELETE
{BASEURI}/pessoa/{id}
```