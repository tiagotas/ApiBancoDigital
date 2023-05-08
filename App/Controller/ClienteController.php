<?php

namespace App\Controller;

use App\Model\ClienteModel;


class ClienteController extends Controller
{
    public static function login()
    {
        // Transformando os dados da entrada enviada do app em
        // JSON para um objeto em PHP.
        $data = json_decode(file_get_contents('php://input'));


       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
       $model = new ClienteModel();

       // Copiando para a Model 
       $model->id_categoria = $data->id_categoria;
       $model->id_cidadao = $data->id_cidadao;
       $model->id_bairro = $data->id_bairro;
       $model->descricao = $data->descricao;
       $model->titulo = $data->titulo;
       $model->endereco = $data->endereco;
       $model->latitude = $data->latitude;
       $model->longitude = $data->longitude;  

       
       /**
        * A cópia também poderia ser feita de forma dinâmica assim:

        * foreach (get_object_vars($object) as $key => $value) {
        *    $this->$key = $value;
        * }
        */

       $model->save(); // chamando o método save da model.

       //parent::setResponseAsJSON('Reclamação inserida com sucesso!');       
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function salvar()
    {
        // Transformando os dados da entrada enviada do app em
        // JSON para um objeto em PHP.
        $data = json_decode(file_get_contents('php://input'));


       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
       $model = new ClienteModel();

       // Copiando para a Model 
       $model->id_categoria = $data->id_categoria;
       $model->id_cidadao = $data->id_cidadao;
       $model->id_bairro = $data->id_bairro;
       $model->descricao = $data->descricao;
       $model->titulo = $data->titulo;
       $model->endereco = $data->endereco;
       $model->latitude = $data->latitude;
       $model->longitude = $data->longitude;  

       
       /**
        * A cópia também poderia ser feita de forma dinâmica assim:

        * foreach (get_object_vars($object) as $key => $value) {
        *    $this->$key = $value;
        * }
        */

       $model->save(); // chamando o método save da model.

       parent::setResponseAsJSON('Reclamação inserida com sucesso!');       
    }
}