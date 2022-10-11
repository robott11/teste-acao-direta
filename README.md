## Requisitos
Sistema feito com php 8.1.6 e com Mariadb 10.8.3

## Instalação

Crie um banco de dados e importe os aquivos ```database/tables.sql``` e ```database/seeds.sql``` respectivamente

copie o arquivo ```.env.example``` para ```.env```

Então preencha ele com as credenciais do banco de dados.

Por fim abra o server com ```php -S localhost:8000 -t public/```

## Rotas

* ```/``` Rota raiz de colaborador para bater ponto
* ```/admin``` Rota de admin para criar colaboradores e ver seus pontos batidos

Login admin padrão:
* Username: root
* Senha: senha