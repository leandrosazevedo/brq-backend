# BACKEND REST API - PHP


## CONSULTAS

# Retorna todas as pessoas
Method: GET
{BASEURI}/pessoas

# Retorna uma pessoa específica
Method: GET
{BASEURI}/pessoa/{id}

# Cria uma pessoa
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

# Atualiza uma pessoa
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

# Deleta uma pessoa
Method: DELETE
{BASEURI}/pessoa/{id}