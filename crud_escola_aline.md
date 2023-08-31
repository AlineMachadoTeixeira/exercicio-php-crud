<!-- Criando um banco de dados no PHP admin -->
```sql
CREATE DATABASE crud_escola_aline CHARACTER SET utf8mb4;
```

<!-- Criar tabela alunos -->
![](modelo-logico.png)
```sql
CREATE TABLE alunos(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    primeira DECIMAL(4,2) NOT NULL,
    segunda DECIMAL(4,2) NOT NULL
); 
```

<!-- Cadastrar 2 alunos para teste -->
```sql
INSERT INTO alunos (
         nome,  primeira, segunda ) 
    VALUES 
    ('Harry Potter',  8.00, 8.00  ), -- linha 1 

    ('Rony Weasley',  10.00, 10.00  ) -- linha 2 
    
```
