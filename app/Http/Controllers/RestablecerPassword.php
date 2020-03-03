<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Barryvdh\DomPDF\Facade as PDF;
use App\Pedido;
use App\Producto;
use App\LineaPedido;
use Illuminate\Support\Facades\Auth;
use Cart;

class RestablecerPassword extends Controller
{

    function enviarEmail( $email, $link ){
    $email_user = "droneshopweb7@gmail.com";
    $email_password = "laravelpassword";
    $the_subject = "Cancelar cuenta DroneShop";
    $address_to = "$email";
    $from_name = "DroneShop";
    $phpmailer = new PHPMailer();
    $body = '<html>
    <head>
        <title>Restablece tu contraseña</title>
    </head>
    <body>
    <p>Hemos recibido una petici&oacuten para restablecer la contrase&ntildea de tu cuenta.</p>
    <p>Si hiciste esta petici&oacuten, haz clic en el siguiente enlace, si no hiciste esta petici&oacuten puedes ignorar este correo.</p>
    <p>
        <strong>Enlace para restablecer tu contrase&ntildea</strong><br>
        <a href="'.$link.'"> Restablecer contrase&ntildea </a>
    </p>
    </body>
    </html>';
    // ---------- datos de la cuenta de Gmail -------------------------------
    $phpmailer->Username = 'droneshopweb7@gmail.com';
    $phpmailer->Password = 'laravelpassword'; 
    //-----------------------------------------------------------------------
    // $phpmailer->SMTPDebug = 1;
    $phpmailer->CharSet = 'UTF-8';
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $phpmailer->Host = 'smtp.gmail.com'; // GMail
    $phpmailer->Port = 587;
    $phpmailer->isSMTP(); // use SMTP
    $phpmailer->SMTPAuth = true;
    $phpmailer->setFrom($phpmailer->Username,$from_name);
    $phpmailer->AddAddress($address_to); // recipients email
    $phpmailer->Subject = $the_subject; 
    $phpmailer->Body = $body;
    //$phpmailer->Body .="<h1 style='color:#3498db;'>Hola $name!</h1>";
    //$phpmailer->Body .= "<p>Mensaje personalizado</p>";
    //$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    $phpmailer->IsHTML(true);
    $phpmailer->Send();

    }

}
