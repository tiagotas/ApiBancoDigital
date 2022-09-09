<?php

use App\Controller\
{
    ClienteController,
    ContaController,
    TransacaoController,
};
use App\Model\TransacaoModel;

// Para saber mais sobre a função parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
switch ($url) 
{
    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/cliente/salvar
    case '/cliente/salvar':
        ClienteController::salvar();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/cliente/entrar
    case '/cliente/login':
        ClienteController::login();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/conta/abrir
    case '/conta/abrir':
        ContaController::abrir();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/conta/fechar
    case '/conta/fechar':
        ContaController::fechar();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/conta/extrato
    case '/conta/extrato':
        ContaController::extrato();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/pix/receber
    case '/transacao/pix/receber':
        TransacaoController::receberPix();
    break;

    // Exemplo de Acesso: https://bancodigital.tiago.blog.br/pix/enviar
    case '/transacao/pix/enviar':
        TransacaoController::enviarPix();
    break;

    default:
        header('HTTP/1.0 403 Forbidden');
    break;
}