
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>

</style>
</head>
<body>

  <h1>Pedido Realizado</h1>
  <table class="container" >
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Precio Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
        @if($producto !== end($productos))
            <tr>
            <td scope="row">{{ $producto['id'] }}</td>
            <td>{{ $producto['nombre'] }}</td>
            <td>{{ $producto['cantidad'] }}</td>
            <td>{{ $producto['precio'] }} €</td>
            <td>{{ $producto['precio_total'] }} €</td>
            </tr>
        @endif
      @endforeach
            <tr>
                <th>Precio Total</th>
            </tr>
            <tr>
                <td>{{ $productos['total'] }} €</td>
            </tr>
    </tbody>
  </table>

</body>
</html>