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
$sql = "SELECT id, nome, tipo, email FROM usuarios";

// Execução do comando e armazenamento do resultado
$resultado = mysqli_query($conexao,$sql) 
or die(mysqli_error($conexao));

// Retornamos o resultado transformado em array associativo
return mysqli_fetch_all($resultado, MYSQLI_ASSOC);

}
