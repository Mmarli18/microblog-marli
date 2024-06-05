<?php

/* Sessões no PHP 
Funcionalidade usada para controle de acesso à determinadas páginas e/ou recursos do site.

Exemplos: área administrativa, painel de controle, perfil de cliente/aluno, area de perfil em redes sociais etc.

Nessas areas o acesso só é possível mediante alguma forma de autenticação. Exemplos: login/senha, digital, facial, envio de codigos por sms, email etc.
*/

// Verificando se não há uma sessão em funcionamento

if (!isset($_SESSION) ) {
    // Se não tem, então inicie uma sessão
    session_start();
}

function verificaAcesso(){
    /* Se NÃO EXISTIR uma variavel de sessão chamada "id" (baseada nos ids do banco de dados) então significa que o usuario não está logado */
    if (!isset($_SESSION['id'])) {
        // Se não esta logado, destruimos a sessão
        session_destroy();

        // Fazemos o usuario voltar para a pagina de login
        header("location:../login.php?acesso_negado");

        // Paramos qualquer outra execução/processamento
        exit; //ou die()  
    }
}

function login($id, $nome, $tipo){
//  variaveis de sessão
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['tipo'] = $tipo;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit;
}