<?php

require "conecta.php";
function formataData($data)
{
    return date("d/m/Y H:i", strtotime($data));
}

function upload($arquivo)
{
    /* Array para validação de tipos de arquivos permitidos */
    $tiposValidos = ["image/png", "image/jpeg", "image/gif", "image/svg+xml"];
    /* Verificando se o tipo de arquivo NÃO é um dos tipos existentes no array tiposValidos */
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>
        alert('Formato inválido');
        history.back();
        </script>";
        exit;
    }
    /* Pegando apenas o nome/extensão do arquivo e colocando em uma váriavel */
    $nome = $arquivo['name'];
    /* Obtendo do servidor o local/nome temporário para o processo de upload */
    $temporario = $arquivo['tmp_name'];

    /* Definindo a pasta de destina + o nome do arquivo */
    $destino = "../imagens/" . $nome;

    /* Neste momento ele tira o arquivo da área temporária e move para o destino indicado (pasta imagens) */
    move_uploaded_file($temporario, $destino);
}


function inserirNoticia($conexao, $titulo, $texto, $resumo, $nomeImagem, $usuarioId)
{
    $sql = "INSERT INTO noticias(titulo, texto, resumo, imagem, usuario_id)
 VALUES('$titulo', '$texto', '$resumo', '$nomeImagem', '$usuarioId')";
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}




function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        // Se o usuario for admin pode ver tudo 
        $sql = "SELECT 
        noticias.id, 
        noticias.titulo, 
        noticias.data, 
        usuarios.nome 
        FROM noticias JOIN usuarios
        ON noticias.usuario_id = usuarios.id 
        ORDER BY data DESC";

        // caso contrário (editor) pode ver apenas as noticias dela
    } else {
        $sql = "SELECT titulo, data, id FROM noticias
        WHERE usuario_id = $idUsuario ORDER BY data DESC";
    }

    $resultado = mysqli_query($conexao, $sql)
        or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}




function lerUmaNoticia($conexao)
{
}

function excluirNoticia($conexao)
{
}
