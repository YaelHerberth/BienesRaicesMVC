<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas(){
        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if(strpos($urlActual, '?')){ // tuve que crear este if para que cuando sea un get, tome el redirect y no el request
            $urlActual = $_SERVER['REDIRECT_URL'];
       }
        
        if($metodo === 'GET' ){
            $fn = $this->rutasGET[$urlActual] ?? NULL;
        }

        if($fn){
            // La URL existe y hay una funcion asociada
            // Esta funcion permite mandar a llamar una funcion cuando no sabemos como se llama esa funcion
            call_user_func($fn, $this);
        } else {
            echo "PAGINA NO ENCONTRADA";
        }
    }

    // Muestra una vista
    public function render($view, $datos = []){
        
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start(); // Almacenamiento en memoria durante un momento...
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpiar el buffer
        include __DIR__ . "/views/layout.php";
    }
}