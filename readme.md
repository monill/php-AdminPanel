## Painel Admin

Anhanguera - 1º Semestre 2018

Trabalho solicitado pelo docente Vanderlei Ienne, da disciplina de Projeto Integrado IV - Desenvolvimento de Sistemas, para fins de avaliação do 4º semestre do ano de 2018, no curso de Análise e Desenvolvimento de Sistemas.

Usuário já cadastrado para login: joao@sysop.com, Senha: x1x2x3x4

### Requisitos: *
- Web server (Apache2 ou Nginx)
- PHP >= 7.2
- Dependências para PHP:
  - php-openssl
  - php-pdo
  - php-mbstring
  - php-tokenizer
  - php-xml
  - php-ctype
  - php-json
  - php=bcmath
  - php-curl
  - php-intl
  - php-zip

- MySQL >= 5.7 ou MariaDB >= 10.2
- Um servidor dedicado decente. Não tente executar isso em algum servidor de baixa qualidade!


### Como instalar:

Windows ou Linux:

Abra o Terminal na pasta do projeto e digite:
```sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
...................
Importe o database.sql no seu banco para uso.
```

Edite o arquivo .env
- DB_CONNECTION=`mysql nesse caso o usado é mysql mesmo`
- DB_HOST=`127.0.0.1 servidor`
- DB_PORT=`3306 porta`
- DB_DATABASE=`database que está usando`
- DB_USERNAME=`seu usuario`
- DB_PASSWORD=`sua senha ou deixe em branco caso não use`

No Terminal novamente digite:
```sh
$ php artisan migrate "para migrar as tabelas"
$ php artisan db:seed "para inserir os primeiros dados nas tabelas"
```
Para rodar em máquina local, no Terminal digite:
```sh
$ php artisan serve "para rodar como localhost:8000"
```


### Index
![Index](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/index.png)
### Login
![Login](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/login.png)
### Dashboard
![Orcamentos](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/dashboard.png)
### Perfil
![Perfil](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/profile.png)
### Blogs
![Blogs](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/blogs.png)
### Blog Edit-Add
![Blog Edit-Add](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/blog-add-edit.png)
### Blog Categorias
![Blog Categorias](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/blog-categories.png)
### Serviços
![Serviços](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/services.png)
### Configurações 1
![Configurações 1](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/settings-1.png)
### Configurações 2
![Configurações 2](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/settings-2.png)
### Configurações 3
![Configurações 3](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/settings-3.png)
### Configurações 4
![Configurações 4](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/settings-4.png)
### Usuários
![Usuários](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/users.png)
### Usuário Edit-Add
![Usuário Edit-Add](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/user-edit-add.png)
### Visitantes
![Visitantes](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/visitors.png)
### Regras
![Regras](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/rules.png)
### Regra Edit-Add
![Regra](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/rule-edit-add.png)
### Permissões
![Permissões](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/permissions.png)
### Logs
![Logs](https://raw.githubusercontent.com/joaorik/admin-panel/master/screens/logs.png)
