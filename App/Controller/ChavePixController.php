<?php

namespace App\Controller;

use App\Model\ChavePixModel;
use Exception;

class ChavePixController extends Controller
{
    /**
     * Salva uma Chave Pix
     */
    public static function salvar() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();

            /**
             * Copiando os valores de $data para $model dinâmicamente
             */ 
            foreach (get_object_vars($data) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

            /**
             * Salvando o novo correntista e definindo a saída.
             * Veja como ficou na Guia "Saída" do Visual Studio 2022
             */
            parent::getResponseAsJSON($model->save()); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }

    /**
     * Remove uma Chave Pix
     */
    public static function remover() : void
    {
        try
        {
            $data = json_decode(file_get_contents('php://input'));

            $model = new ChavePixModel();

            /**
             * Copiando os valores de $data para $model dinâmicamente
             */ 
            foreach (get_object_vars($data) as $key => $value) 
            {
                $prop_letra_minuscula = strtolower($key);

                $model->$prop_letra_minuscula = $value;
            }

            /**
             * Salvando o novo correntista e definindo a saída.
             * Veja como ficou na Guia "Saída" do Visual Studio 2022
             */
            parent::getResponseAsJSON($model->save()); 

        } catch(Exception $e) {
            
            parent::LogError($e);
            parent::getExceptionAsJSON($e);
        }
    }
}