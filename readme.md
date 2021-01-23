# CRUD em PHP Orientado a Objetos, com PDO e MySQL

## Configuração do banco de DADOS

As credenciais do banco de dados estão no arquivo `./app/Database/Database.php`, nas constantes `HOST`, `NAME`, `USER` e `PASS`, e devem ser alteradas de acordo com a configuração de cada ambiente.

## Composer

Nese projeto foi utilizado o composer para gerar o arquivo `autoload` das classes.
O site oficial para o Dowload do composer é [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o seguinte comando no terminal:

```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto com as dependencias necessárias.
