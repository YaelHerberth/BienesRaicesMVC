<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

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
        $router->render('paginas/nosotros', []);
    }
    public static function anuncios(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades,
        ]);
    }
    public static function anuncio(Router $router)
    {
        $id = $_GET['id'];
        $propiedad = Propiedad::find($id);
        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad,
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }
    public static function contacto(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // Crear una nueva instancia de PHP Mailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '33d0b68ca4725b';
            $mail->Password = 'd0380220ca9f09';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Contacto con BienesRaices';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<h2> Información personal </h2>';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre']  . ' </p>';
            $contenido .= '<p> Mensaje: ' . $respuestas['mensaje']  . ' </p>';
            $contenido .= '<h2> Información de la propiedad </h2>';
            $contenido .= '<p> Vende o Compra: ' . $respuestas['tipo']  . ' </p>';
            $contenido .= '<p> Presupuesto: ' . '$ ' . $respuestas['precio']  . ' </p>';
            $contenido .= '<h2> Contacto </h2>';

            // Enviar de forma condicional algunos campos de email o telefono

            if ($respuestas['contacto'] === 'Telefono') {
                $contenido .= '<p> Teléfono: ' . $respuestas['telefono']  . ' </p>';
                $contenido .= '<p> Desea ser contactado el dia: ' . $respuestas['fecha']  . ' </p>';
                $contenido .= '<p> En la hora: ' . $respuestas['hora']  . ' </p>';
                
            } else if ($respuestas['contacto'] === 'Email') {
                $contenido .= '<p> E-mail: ' . $respuestas['email']  . ' </p>';
            } else {
                header("Location: /contacto?respuesta=2");
            }
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin html';

            // Enviar el email
            if ($mail->send()) {
                header("Location: /contacto?respuesta=1");
            } else {
                header("Location: /contacto?respuesta=2");
            }
        }
        $router->render('paginas/contacto', []);
    }
}
