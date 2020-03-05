<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
        <div id="logo">
          <img src="{{asset('/assets/images/logo.png')}}">
        </div><br><br>
        <h1>Factura</h1>
        <div id="company" class="clearfix">
          <div>Drone</div>
          <div>C/Cabezas Rubias 9<br /> HUELVA 21007, ES</div>
          <div>+34 672 77 77 77</div>
          <div><a href="mailto:droneshop@droneshop.com">droneshop@droneshop.com</a></div>
        </div>
        <div id="project">
          <div><span>NOMBRE:</span>{{Auth::user()->nombre}}</div>
          <div><span>APELLIDOS:</span>{{Auth::user()->apellidos}}</div>
          <div><span>DIRECCIÓN:</span>{{Auth::user()->direccion}}</div>
          <div><span>EMAIL:</span>{{Auth::user()->email}}</div>
          <div><span>FECHA:</span> {{date('d/m/Y', strtotime($pedido->fecha))}} </div>
        </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach($productos as $producto)
          @if($producto !== end($productos))
            <tr>
              <td class="service" scope="row">{{ $producto['id'] }}</td>
              <td class="desc">{{ $producto['nombre'] }}</td>
              <td class="unit">{{ $producto['precio'] }} €</td>
              <td class="qty">{{ $producto['cantidad'] }}</td>
              <td class="total">{{ $producto['precio_total'] }} €</td>
            </tr>
          @endif
        @endforeach
      
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ number_format($productos['total'] / 1.21,2) }} €</td>
          </tr>
          <tr>
            <td colspan="4">IVA 21%</td>
            <td class="total">{{ number_format($productos['total'] * 0.21,2) }}</td>
          </tr>
          <tr>
            <td colspan="4">GASTOS DE ENVÍO</td>
            <td class="total"><?php $envio=4.99; echo $envio; ?> €</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">{{ $productos['total'] }} €</td>
          </tr>
        </tbody>
      </table>
      
    </main>
    <footer>
      Drone Shop
    </footer>
  </body>
</html>