# api-product-search

## Instalação

* Clonar o projeto, e em seguida navegar até a pasta do projeto:
```
$ git clone https://github.com/rafaelo19/api-product-search-simple.git

$ cd api-product-search
```

* Criando o ambiente:
```
$ docker-compose up -d --build
```

* Instalando depêndencias da aplicação:
```
$ docker exec api-product-search composer install
```

* Excutar migration para criar tabelas do banco de dados e popular algumas:
```
$ docker exec api-product-search composer migration:migrate:seed
```

* Se necessário entrar no shell do container:
```
$ docker exec -it api-product-search bash
```

## Rotas
| Url                              | Metodo  |  Uso                        |
| :--------------------------------|:--------| :---------------------------|
| /produtos/{id}                   | GET     | Busca produto por id        |

## Dados para consumir rotas

##### Request: ` /produtos/{id}` 
 
 - Os dados no endpoint são `id` subistituindo pela id do produto desejado, aceita apenas int.
 - Response:
    - Dados retornados e suas tipagens:
        * `data`: array
        * `id`: int 
        * `nome`: string
        * `fornecedor`: string
        * `marca`: string
        * `marca`: string
        * `estoque`: int
        * `preco`: float
 ```
   {
       "data": [
           {
               "id": 1,
               "nome": "Tênis Sb",
               "fornecedor": "Fornecedor 1",
               "marca": "Nike",
               "cor": "preto",
               "estoque": 10,
               "preco": 169.68
           }
       ]
   }
 ```
  
  
 
