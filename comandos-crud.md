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

# asteristicos * seleciona toda a linha
```sql
SELECT * FROM usuarios WHERE id > 1;
```

### UPDATE na tabela de usuários

```sql
UPDATE usuarios SET tipo = 'editor'
WHERE id = 1;

-- OBS: Nunca esqueça de passar pelo menos uma condição para o UPDATE!
```

### DELETE na tabela de usuários

```sql
DELETE FROM usuarios
WHERE id = 2;

-- OBS: Nunca esqueça de passar pelo menos uma condição para o DELETE!

```
<!-- Inserindo mais dois usuarios -->
```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Patrícia', 'paty@gmail.com', 'paty2050', 'editor');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Roberto Carlos', 'carlinho@gmail.com', '123caca', 'editor');
```

```sql
INSERT INTO usuarios(nome, email, senha, tipo)
VALUES('Maria Isabella', 'belinha@gmail.com', '123bela', 'admin');
```

```sql
SELECT id, nome, tipo FROM usuarios;

```

### Exemplos para tabela de notícias

### Inserir noticias

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'São Paulo FC Campeão da Libertadores 24',
    'Após excelentes jogos o time foi campeão 2024',
    'O único time do Brasil tetra campeão',
    'time.jpg',
    1
);

```

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Saiu maior prêmio da mega-sena',
    'Ganhador é do estado de São Paulo',
    'Ganhador ganhou sozinho premio de R$ 1.0000,00',
    'ganhadormega.jpg',
    3
);

```

```sql
INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
VALUES(
    'Maior festival de eletronicas do ano',
    'Começa essa semana lollapalooza',
    'Vai começar grande festival de musicas eletronicas',
    'festival.jpg',
    5
);

```

### Select em noticias

```sql
SELECT titulo, data FROM noticias;
```

```sql
SELECT titulo, data FROM noticias ORDER BY data DESC;
-- Usamos ORDER BY data DESC para classificar em ordem decrescente pela data.
```

### SELECT com JOIN (consulta com junção de tabelas)

**Objetivo:** realizar uma consulta que mostre a data e o título da notícia **e** o nome do autor da notícia.

```sql
-- Selecionando as colunas indicando as tabelas em que estão
SELECT
noticias.data,
noticias.titulo,
usuarios.nome
-- Especificamos as tabelas que serão juntadas/combinadas
FROM noticias JOIN usuarios
-- Criterio da junção - Relacionamento entre as tabelas através das chaves (chaveESTRANGEIRA FK = chavePRIMARIA PK)
ON noticias.usuario_id = usuarios.id;

```