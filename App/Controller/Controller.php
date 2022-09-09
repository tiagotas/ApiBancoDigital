<?php

/**
 * Definição do namespace da controller. Veja que temos o namespace chamado "App"
 * e dentro do namespace App temos o subnamespace "Controller". Também é importante
 * observar que eles são o mesmo caminho de diretórios e usamos barra invertida
 * para definir os namespaces.
 * Leia mais sobre namespaces => http://www.diogomatheus.com.br/blog/php/entendendo-namespaces-no-php/
 * Namespaces no manual => https://www.php.net/manual/pt_BR/language.namespaces.rationale.php
 */
namespace App\Controller;


/**
 * Classe abstrata Controller para armazenar métodos comuns às classes Controller.
 * Manual do PHP => https://www.php.net/manual/pt_BR/language.oop5.abstract.php
 * Leia mais sobre abstração: https://www.devmedia.com.br/trabalhando-com-abstracao-em-php/28351
 */
abstract class Controller 
{
    /**
     * Converte um dado para JSON
     */
    protected static function getResponseAsJSON($data)
    {
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($data));
    }

    /**
     * Dá uma resposta do servidor como JSON
     */
    protected static function setResponseAsJSON($data, $request_status = true)
    {
        $response = array('response_data' => $data, 'response_successful' => $request_status);

        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");

        exit(json_encode($response));
    }
}