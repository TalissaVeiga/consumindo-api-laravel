# Consumindo API externa com Laravel

Projeto desenvolvido como exercício do curso Back End – 3º Ciclo, com o objetivo de consumir uma API externa utilizando Laravel.

A aplicação recebe um CEP, consulta a API pública ViaCEP, salva o endereço retornado no banco de dados e disponibiliza os dados através de uma API própria.

## Tecnologias utilizadas

- PHP 8.4
- Laravel 13
- PostgreSQL
- ViaCEP
- Laravel HTTP Client
- Eloquent ORM

## Funcionalidades

- Consulta de endereço através do CEP
- Consumo da API ViaCEP
- Armazenamento dos endereços consultados no banco de dados
- Consulta de endereços já armazenados
- Evita nova consulta à ViaCEP quando o CEP já está cadastrado
- Tratamento de CEP inválido com resposta HTTP 404

## Instalação

Clone o repositório:

git clone https://github.com/TalissaVeiga/consumindo-api-laravel.git

Entre na pasta do projeto:

cd consumindo-api-laravel

Instale as dependências:

composer install

Crie o arquivo .env a partir do .env.example.

Gere a chave da aplicação:

php artisan key:generate

## Configuração do banco de dados

Este projeto utiliza PostgreSQL.

No arquivo .env, configure os dados do banco:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=consumindo_api
DB_USERNAME=postgres
DB_PASSWORD=sua_senha

Depois, execute as migrations:

php artisan migrate

## Executando o projeto

Inicie o servidor Laravel:

php artisan serve

A API ficará disponível em:

http://localhost:8000

## Rotas da API

### Consultar um CEP

GET /api/enderecos/{cep}

Exemplo:

http://localhost:8000/api/enderecos/01001000

A aplicação verifica primeiro se o CEP já está cadastrado no banco. Caso não esteja, consulta a API ViaCEP, salva o endereço e retorna os dados.

### Listar endereços consultados

GET /api/enderecos

Exemplo:

http://localhost:8000/api/enderecos

Essa rota retorna todos os endereços que já foram consultados e armazenados no banco de dados.

## Testes

Exemplo de consulta de um CEP válido:

curl.exe http://localhost:8000/api/enderecos/01001000

Exemplo de consulta de outro CEP válido:

curl.exe http://localhost:8000/api/enderecos/90010000

Exemplo para listar os endereços armazenados:

curl.exe http://localhost:8000/api/enderecos

Exemplo de CEP inválido:

curl.exe http://localhost:8000/api/enderecos/99999999

Para um CEP inválido, a API retorna o status HTTP 404 e a mensagem:

{
    "mensagem": "CEP não encontrado."
}

## Estrutura do projeto

Os principais arquivos utilizados neste exercício são:

- app/Models/Endereco.php — modelo do endereço
- app/Http/Controllers/EnderecoController.php — lógica da API
- database/migrations/ — migrations do banco de dados
- routes/api.php — rotas da API

## Autor

Talissa Veiga