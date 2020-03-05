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


class PedidoController extends Controller
{
    public function addPedido(){
        $pedido = Pedido::create(['nombre' =>Auth::user()->nombre ,
            'apellidos' => Auth::user()->apellidos ,
            'email' => Auth::user()->email ,
            'dni' => Auth::user()->dni ,
            'direccion' => Auth::user()->direccion ,
            'fecha' => date('Y-m-d'),
            'usuario_id'=>Auth::id()]);


        foreach(Cart::getContent() as $item){

            $idPedido = $pedido->id;
            LineaPedido::create(['cantidad'=>Cart::get($item->id)->quantity,
            'precio'=>$item->price,
            'producto_id'=>$item->id,
            'pedido_id'=>$idPedido
            ]);
 
            $producto = Producto::where('id', $item->id)->first();

            Producto::where('id', $item->id)->update(['stock'=> $producto->stock - Cart::get($item->id)->quantity]);

        }
        
            $data = [
                'titulo' => 'Pedido DroneShop'
            ];
         
            $data = PDF::loadView('email', $data)
                ->save(storage_path('app/public/') . 'pedido.pdf');
            
 
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'droneshopweb7@gmail.com';                     // SMTP username
                $mail->Password   = 'laravelpassword';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('droneshopweb7@gmail.com', 'DroneShop');
                $mail->addAddress(auth()->user()->email, auth()->user()->nombre);     // Add a recipient   // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
            
                // Attachments
                $mail->addAttachment(storage_path('app/public/') . 'pedido.pdf');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Este es tu pedido,Gracias por confiar en nosotros!';
                $mail->Body    = view('email') ;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }    
           
                    
         Cart::clear();

         return redirect('/compra_confirmada');
        }



     /**
     * Mostrar los productos de la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function miPedido()
    {
        $mispedidos = Pedido::where('usuario_id', Auth::id())->orderBy('id','DESC')->get(); //->paginate(5)
        return view('/cliente/mis_pedidos', ['mispedidos' => $mispedidos]);

        $data = LineaPedido::where("pedido_id", $id)->get()->toArray();
        $total = 0;
        $i = -1;

        foreach ($data as $producto) {

            $i++;
            $producto_seleccionado =  Producto::where("id", $producto['producto_id'])->first();

            $data[$i]['nombre'] = $producto_seleccionado->nombre;
            $data[$i]['precio_total'] = $producto['precio']*$producto['cantidad'];

            $total += $producto['precio']*$producto['cantidad'];

        }

        $data['total'] = $total;

    }

     /**
     * Mostrar informacion de los pedidos.
     *
     * @return \Illuminate\Http\Response
     */
    public function informacionPedido($id)
    {
        $productos = LineaPedido::where("pedido_id", $id)->get()->toArray();
        $total = 0;
        $i = -1;

        foreach ($productos as $producto) {

            $i++;
            $producto_seleccionado =  Producto::where("id", $producto['producto_id'])->first();

            $productos[$i]['nombre'] = $producto_seleccionado->nombre;
            $productos[$i]['precio_total'] = $producto['precio']*$producto['cantidad'];

            $total += $producto['precio']*$producto['cantidad'];

        }

        $productos['total'] = $total;

        return view('cliente/info_pedido', ['productos' => $productos]);

    }

    /**
     * Mostrar los productos de la base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function anularPedido($id)
    {
        $anularpedido = Pedido::where("id", $id)->update([
            "estado"=>"Anulado",
        ]);
        return redirect('/mis_pedidos');

    }

    public function downloadPdf($id)
    {
        $data = LineaPedido::where("pedido_id", $id)->get()->toArray();
        $total = 0;
        $i = -1;

        foreach ($data as $producto) {

            $i++;
            $producto_seleccionado =  Producto::where("id", $producto['producto_id'])->first();

            $data[$i]['nombre'] = $producto_seleccionado->nombre;
            $data[$i]['precio_total'] = $producto['precio']*$producto['cantidad'];

            $total += $producto['precio']*$producto['cantidad'];

        }

        $data['total'] = $total;

        $pedido = Pedido::where('id', $id)->first();

        $pdf= PDF::loadView('factura', array('productos' => $data,'pedido' => $pedido

        ))->save(storage_path('app/public/') . 'pedido.pdf');
        return $pdf->download('pedido.pdf'); 
        
        
    }
    

}
