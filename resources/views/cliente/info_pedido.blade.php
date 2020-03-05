@include("cliente/header")

<!-- VISTA EN LA QUE SE MUESTRA LA INFORMACIÓN DEL PEDIDO QUE HEMOS SELECCIONADO ANTERIOR MENTE -->
<div class="site-section">
    <div class="container">


      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Información Pedido</h2>
          <div class="p-2 p-lg-5 border">
            <table class="table site-block-order-table mb-3">
              <thead>
                <th>Id</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total Producto</th>
              </thead>
              <tbody>

                @foreach($productos as $producto)
                @if($producto !== end($productos))
                  <tr>
                    <td>{{ $producto['id'] }}</td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ $producto['precio'] }} € </td> 
                    <td>{{ $producto['cantidad'] }}</td>   
                    <td>{{ $producto['precio_total'] }} € </td>                     
                  </tr>
                  @endif
                @endforeach

                <tr>
                  <td class="text-black font-weight-bold"><strong>Total Productos</strong></td>
                  <td class="text-black">{{ $productos['total'] }} €</td>
                </tr>
                <tr>
                  <td class="text-black font-weight-bold"><strong>Base Imponible</strong></td>
                  <td class="text-black">{{ number_format($productos['total'] / 1.21,2) }} €</td>
                </tr>
                <tr>
                  <td class="text-black font-weight-bold"><strong>IVA (21%)</strong></td>
                  <td class="text-black">{{ number_format($productos['total'] * 0.21,2) }} €</td>
                </tr>
                <tr>
                  <td class="text-black font-weight-bold"><strong>Gastos de Envío</strong></td>
                  <td class="text-black"><?php $envio=4.99; echo $envio; ?> €</td>
                </tr>
                <tr>
                  <td class="text-black font-weight-bold"><strong>Total Pedido</strong></td>
                  <td class="text-black font-weight-bold"><strong>{{ $productos['total'] + $envio }} €</strong></td>
                </tr>
                
              </tbody>
            </table>
         

        <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">
              <ul class="pagination justify-content-md-center">
                  
                 <!--  $mispedidos->render() --> 

              </ul>
          </div>
        </div>
      </div>
      </div>
      <!-- </form> -->
    </div>
  </div>


@include("footer")