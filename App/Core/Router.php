<?php

namespace App\Core;

class Router{

    private $controller;

    private $method;

    private $params;

    function __construct(){
        
        //pegar a url que está sendo acessada
        $url = $this->parseURL();

        //existe um controller com este nome
        if(file_exists("../App/Controllers/" . $url[1] . ".php")){

            $this->controller = $url[1];
            unset($url[1]);

        }elseif(empty($url[1])){

            $this->controller = "produtos";

        }else{
            $this->controller = "erro404";
        }

        require_once "../App/Controllers/" . $this->controller . ".php";

        $this->controller = new $this->controller;

        //verificar se o métodos da url existe dentro do controller
        if(isset($url[2])){
            if(method_exists($this->controller, $url[2])){
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }else{
                $this->method = "index";
            }
        }else{
            $this->method = "index";
        }

        //pegamos apenas os valores dos parametros da url (posição [3] em diante)
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    //retorna o controller, o método e os params da url em um vetor
    private function parseURL(){
        return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }

}