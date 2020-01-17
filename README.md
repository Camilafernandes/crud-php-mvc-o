# CRUD-MVC-PHP-OO
Crud em MVC e PHP OO
### Objetivo: 

>Sistema CRUD simples em PHP 7 (sem frameworks) com OO e MySQL.

## Configuração do Projeto:

- Executar a query script.sql ou importar o arquivo no phpMyAdmin para criar as tabelas necessária.
- Editar o arquivo **init.php** 

```
$dbNome = 'nomeDaTable' 
$dbHost = 'nomeDoDominioOuIP:Porta' 
$dbUsuario = 'usuarioDoMysql' 
$dbSenha 'senhaDoUsuario'

```

### Detalhes sobre o projeto:

1.  init.php são os arquivos de configurações
2.  diretório "view" é onde fica todas as telas
3.  diretório "controller" é onde fica fica as funcionalidades que interragem com o banco de dados
4.  diretório "model" é onde fica os arquivos de conexão com o banco de dados

No diretório "view" existem 3 páginas principais: editar.php, cadastro.php e index.php, a página head e menu.

No diretório "controller" estão os arquivos PHP que executam as funcionalidades do sistema.

No diretório "model" estão os arquivos de conexão com o Banco de Dados

O arquivo script.sql é o scrip em sql que cria o banco e a tabela.
