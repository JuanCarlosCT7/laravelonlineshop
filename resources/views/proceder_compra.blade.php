@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif

<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">

            @if (!Auth::check())

              <div class="border p-4 rounded alert alert-danger" role="alert">
                Debe estar registrado para seguir con la compra.    <strong><a href="{{url('/login')}}">   Iniciar Sesión</a></strong>
              </div>
          
            @endif

        </div>
      </div>
   
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Tu Pedido</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Producto</th>
                    <th>Total Producto</th>
                  </thead>
                  <tbody>

                    @foreach(Cart::getContent() as $item)
                      <tr>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }} € </td>    
                        <td>{{ $item->price * $item->quantity}} € </td>                     
                      </tr>
                    @endforeach

                    <tr>
                      <td class="text-black font-weight-bold"><strong>Base Imponible</strong></td>
                      <td class="text-black">{{ number_format(Cart::getTotal() / 1.21,2) }} €</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>IVA (21%)</strong></td>
                      <td class="text-black">{{  number_format(Cart::getTotal() * 0.21,2) }} €</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Gastos de Envío</strong></td>
                      <td class="text-black"><?php $envio=4.99; echo $envio; ?> €</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Total Pedido</strong></td>
                      <td class="text-black font-weight-bold"><strong>{{ Cart::getTotal() + $envio }} €</strong></td>
                    </tr>
                    
                  </tbody>
                </table>

                @if (Auth::check())

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Pagar con Tarjeta de Crédito</a></h3>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Pagar con Paypal</a></h3>
                  </div>

                  <div class="form-group">
                    <a class="btn btn-primary btn-lg py-3 btn-block" href="{{url('/comprando')}}">FINALIZAR COMPRA</a>
                  </div>

                @endif           

              </div>
            </div>
          </div>  
        </div>
      </div> 
      <!-- </form> -->
    </div>
  </div>


@include("footer")