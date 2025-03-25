# Plataforma de Tarefas

Esse projeto é uma plataforma simples para gerenciar tarefas pessoais. Ele utiliza PHP, MySQL e Bootstrap para a interface.

## Como rodar o projeto

1. Clone o repositório:
    ```
    git clone https://github.com/username/task-manager.git
    ```

2. Crie o banco de dados `task_manager` e rode os seguintes comandos SQL para criar as tabelas:
    ```sql
    CREATE TABLE users (...);
    CREATE TABLE tasks (...);
    ```

3. Configure o banco de dados em `src/Config/Database.php`.

4. Rode o servidor PHP:
    ```
    php -S localhost:8000
    ```

5. Acesse pelo navegador:
    ```
    http://localhost:8000
    ```

## Funcionalidades

- Cadastro de usuário
- Login de usuário
- CRUD de tarefas (Criar, Listar, Concluir)
