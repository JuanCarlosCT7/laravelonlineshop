@include("cliente/header")


<div class="site-section">
    <div class="container">
      
          <div class="row mb-5">
            <div class="offset-md-1 col-md-10 offset-md-1">
              <h2 class="h3 mb-3 text-black">Mis Pedidos</h2>

              @foreach ($mispedidos as $pedido)

              <div class="border">                

                <table class="table site-block-order-table">
                  <thead>
                    <td><b>Realizado:</b> <code style="font-size:1em">{{date('d/m/Y', strtotime($pedido['fecha']))}}</code> </td>     
                    <td><b>Estado del pedido:</b> <i>{{$pedido['estado']}}</i><td>
                  </thead>
                  <tbody>
                      <tr>
                          <td><b>Número de Pedido:</b> {{$pedido['id']}}</td>
                          <td><b>Dirección:</b> {{$pedido['direccion']}}</td>

                          @if($pedido['estado'] == 'Pendiente Procesamiento')

                          <td><a class="btn btn-primary" href="{{ url('/info_pedido/' . $pedido['id']) }}">Info</a></td>
                          <td><a class="btn btn-danger" href="{{ url('/anular_pedido/' . $pedido['id']) }}">Anular</a></td>
                          <td><a class="btn btn-success" href="{{ url('/descarga_pdf/' . $pedido['id']) }}">PDF</a></td>

                          @endif    
                      </tr>
                  </tbody>
                </table>

          </div>
        <br>
        @endforeach

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