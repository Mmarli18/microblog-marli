<?php
/* Acessando os dados da conexão ao servidor */
require "conecta.php";

function inserirUsuario($conexao, $nome, $email, $tipo, $senha){
    // Montando um comando sql em uma variavel 
    $sql = "INSERT INTO usuarios(nome, email, tipo, senha)
      VALUES('$nome', '$email','$tipo','$senha')";
    
    // Executando o comando no banco
    // or die faz a operação parar se ocorrer erro,e faz mostrar o erro
    mysqli_query($conexao,$sql) or die(mysqli_error($conexao));   
}


function lerUsuario($conexao){
$sql = "SELECT id, nome, tipo, email 
FROM usuarios ORDER BY nome";

// Execução do comando e armazenamento do resultado
$resultado = mysqli_query($conexao,$sql) 
or die(mysqli_error($conexao));

// Retornamos o resultado transformado em array associativo com todos os usuarios
return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}

function lerUmUsuario($conexao, $id){
  $sql = "SELECT * FROM usuarios WHERE id = $id";
  $resultado = mysqli_query($conexao,$sql)
  or die(mysqli_error($conexao));

  // assoc Retorna apenas um array associativo com os dados de apenas um usuário
  return mysqli_fetch_assoc($resultado);
}

function atualizarUsuario($conexao, $id, $nome, $email, $senha, $tipo){
  $sql = "UPDATE usuarios SET 
  nome = '$nome',
  email = '$email',
  senha = '$senha',
  tipo = '$tipo'
  WHERE id = $id"; 
  // ATENÇÃO NÃO ESQUEÇA DA CONDIÇÃO WHERE 

  mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
}

function excluirUsuario($conexao, $id){
  $sql = "DELETE FROM usuarios
  WHERE id = $id";
  
  mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

}


function buscarUsuario($conexao, $email){
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $resultado = mysqli_query($conexao, $sql)
  or die(mysqli_error($conexao));

  return mysqli_fetch_assoc($resultado);
}