<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

  <h1>Pedido Realizado</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      @foreach(Cart::getContent() as $producto)
        <tr>
          <td scope="row">{{ $producto->id }}</td>
          <td>{{ $producto->name }}</td>
          <td>{{ $producto->quantity }}</td>
          <td>{{ $producto->price }} €</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>