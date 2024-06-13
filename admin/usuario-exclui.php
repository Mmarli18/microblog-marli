<?php

require_once "../inc/funcoes-sessao.php";
require_once "../inc/funcoes-usuarios.php";

// Verificando se o usuario pode(tem nivel) acessar essa pagina
verificaAcesso();
verificaNivel();


$id = (int)$_GET['id'];

excluirUsuario($conexao, $id);

header("location:usuarios.php");
