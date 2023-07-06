<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController
{


    public static function index(Router $router)
    {
        $inicio = true;
        $propiedades = Propiedad::get(3);

        $router->render('paginas/index', [
            'inicio' => $inicio,
            'propiedades' => $propiedades,
        ]);
    }
    public static function nosotros(Router $router)
    {
        $inicio = false;
        $router->render('paginas/nosotros', [
            'inicio' => $inicio,
        ]);
    }
    public static function anuncios(Router $router)
    {
        $inicio = false;
        $propiedades = Propiedad::get(10);
        $router->render('paginas/anuncios', [
            'inicio' => $inicio,
            'propiedades' => $propiedades,
        ]);
    }
    public static function blog(Router $router)
    {
        $inicio = false;
        $router->render('paginas/blog', [
            'inicio' => $inicio,
        ]);
    }
    public static function entrada(Router $router)
    {
        echo 'desde entrada';
    }
    public static function contacto(Router $router)
    {
        $inicio = false;
        $router->render('paginas/contacto', [
            'inicio' => $inicio,
        ]);
    }
}
