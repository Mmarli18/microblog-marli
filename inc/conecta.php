<?php
/* Script de conexão ao servidor de banco de dados. Necessário para que o microblog possa usar o MySQL  */

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "microblog_marli";

// Função para conexão com o servidor do banco de dados
$conexao = mysqli_connect($servidor,$usuario,$senha,$banco);

// Definindo o charset da conexão para utf8
mysqli_set_charset($conexao, "utf8");

/* Fazendo um teste de conexão */

if (!$conexao) {
    die("Problema encontrado:" .mysqli_connect_error());
} else {
    echo "Tudo certo, conectado... ";
}