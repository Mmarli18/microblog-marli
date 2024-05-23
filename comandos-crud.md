# Operações CRUD

## Resumo

- C: CREATE (INSERT) -> inserir dados
- R: READ (SELECT) -> ler/carregar dados
- U: UPDATE (UPDATE) -> atualizar dados
- D: DELETE (DELETE) -> excluir dados

## Exemplos

### INSERT na tabela de usuários

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Marli', 'mahmorais@gmail.com', '123senac', 'admin');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Monique', 'monique123@gmail.com', 'senac897', 'editor');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Henrique', 'henrique@gmail.com', 'riq2050', 'editor');
```

### SELECT na tabela de usuários

```sql
SELECT nome, email FROM usuarios;

```

```sql
SELECT nome, email FROM usuarios WHERE tipo = 'admin';
```

```sql
SELECT * FROM usuarios WHERE id > 1;
```