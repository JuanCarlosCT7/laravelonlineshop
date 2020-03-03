@include("cliente/header")


<div class="site-section">
    <div class="container">
      
          
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Mis Pedidos Realizados</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Fecha</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th></th>
                    
                  </thead>
                  <tbody>
                    @foreach ($mispedidos as $pedido)
      
                      <tr>
                          <td>{{$pedido['fecha']}}</td>
                          <td>{{$pedido['direccion']}}</td>
                          <td>{{$pedido['estado']}}</td>

                          
                          @if($pedido['estado'] == 'Pendiente Procesamiento')

                          <td><a class="btn btn-danger" href="{{ url('/anular_pedido/' . $pedido['id']) }}">Anular</a></td>

                          @endif
                          
                      </tr>
                      
                  @endforeach
                  </tbody>
                </table>


        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>


@include("footer")