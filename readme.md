### TEP - Tópicos Especiais em Programação

Este projeto tem como objetivo mostrar um exemplo básico de um sistema escolar com cadastro de professores, turmas e grades.

### Comandos a serem executados após baixar o repositório e instalar todas as dependências.

```bash

$ composer install
$ npm i
$ php artisan key:generate
$ cp .env.example .env
$ nano .env
```

No arquivo .env você deverá especificar o banco de dados, usuário e senha, e após rodar o comando:

```bash
$ php artisan migrate
```
