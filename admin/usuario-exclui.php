<?php

require_once "../inc/funcoes-usuarios.php";

$id = $_GET['id'];

excluirUsuario($conexao, $id);

header("location:usuarios.php");
