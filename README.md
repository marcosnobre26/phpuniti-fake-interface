# Testes Unitarios de Usuario - Create/Update

Este é um projeto de testes automatizados em PHP utilizando a ferramenta PHPUnit. Neste arquivo, explicaremos o teste de unidade realizado na classe UserController.


#  Sobre o teste

O teste em questão é um teste de unidade que tem como objetivo validar o comportamento do método `create` e `update` na classe `UserController`.

O método `create` recebe um objeto `Request` contendo informações do usuário e deve acionar o método `create` da classe `UserService`, que por sua vez, aciona o método `create` da interface `UserRepositoryInterface` para persistir os dados do usuário.

O método `update` recebe um objeto `Request` contendo informações do usuário e o ID do usuário a ser atualizado, e deve acionar o método `update` da classe `UserService`, que por sua vez, aciona o método `update` da interface `UserRepositoryInterface` para atualizar os dados do usuário.

##  Como executar o teste

Para executar o teste, basta executar o comando `phpunit` na raiz do projeto. Certifique-se de ter o PHPUnit instalado em sua máquina antes de executar o teste.

```bash

./vendor/bin/phpunit --filter UserControllerTest

```

## Tecnologias utilizadas

-   PHP
-   PHPUnit
-   Faker
-   Mockery

## Como contribuir

Caso queira contribuir com o projeto, basta fazer um fork do repositório e enviar um pull request com as suas modificações. Será um prazer receber a sua contribuição!