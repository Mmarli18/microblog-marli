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




function lerUmaNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        // Se o tipo de usuario for admin pode ver todas as noticias
        $sql = " SELECT * FROM noticias 
        WHERE id = $idNoticia";
    } else {
        // Se for editor vai poder ver somente suas noticias (basta saber qual noticia e qual usuario)
        $sql = "SELECT * FROM noticias 
        WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    $resultado = mysqli_query($conexao, $sql)
        or die(mysqli_error($conexao));

    // Retornando um ARRAY com os dados da noticia escolhida
    return mysqli_fetch_assoc($resultado);
}





function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        // Pode atualizar QUALQUER noticia (basta saber qual)
        $sql = "UPDATE noticias SET titulo = '$titulo',
        texto = '$texto',
        resumo = '$resumo',
        imagem = '$imagem'
        WHERE id = $idNoticia";
    } else {
        /* Pode atualizar SOMENTE suas proprias noticias
        (basta saber qual noticia e qual usuario) */
        $sql = "UPDATE noticias SET 
        titulo = '$titulo',
        texto = '$texto',
        resumo = '$resumo',
        imagem = '$imagem'
        WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}


function excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == 'admin') {
        $sql = "DELETE FROM noticias
    WHERE id = $idNoticia";
    } else {
        $sql = "DELETE FROM noticias 
    WHERE id = $idNoticia AND usuario_id = $idUsuario";
    }
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
}



/* Funções usadas nas páginas PÚBLICAS do Microblog: index, noticia, resultados */

// index.php
function lerTodasNoticias($conexao){
    $sql = "SELECT titulo, imagem, resumo, id
    FROM noticias ORDER BY data DESC";

    $resultado = mysqli_query($conexao,$sql)
    or die(mysqli_error($conexao));

    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
}



// noticia.php
function lerNoticiaCompleta($conexao){}



// resultados.php
function busca($conexao){}