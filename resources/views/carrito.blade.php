@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif


<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="site-blocks-table">

            @if (Session::has('error')) <!-- MENSAJE DE ERROR CUANDO EL STOCK ES INFERIOR A LA CANTIDAD AÑADIDA -->
              <div class="alert alert-danger" role="alert">
                No hay suficiente <b>stock</b> para este artículo.
              </div>
            @endif

          @if(Cart::isEmpty()) <!-- SI EL CARRITO ESTÁ VACÍO -->

            <table class="table table-bordered" mb-10>
              <tr>
                <td class="h3" bgcolor="#f5f5f0"><span class="icon-shopping-cart h1"></span><br>
                  ¡El carrito esta vacío!</td>
              </tr>
            </table>

          @else

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Imagen</th>
                  <th class="product-name">Producto</th>
                  <th class="product-price">Precio</th>
                  <th class="product-quantity">Cantidad</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Eliminar</th>
                </tr>
              </thead>
              <tbody>

              @foreach(Cart::getContent() as $item)

              <input type="hidden" name="id" value="{{$item->id}}"/>

                <tr>
                  <td class="product-thumbnail">
                    <img src="{{asset('/' . $item->attributes->imagen)}}" alt="Imagen" class="img-fluid">
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black">{{ $item->name }}</h2>
                  </td>
                  <td class="h4 text-black">{{ $item->price }} €</td>

                  <!-- --------------------------------------------------------------------------------------- -->

                  <td>
                    <form action="{{url('/add_carrito/'. $item->id . '/1')}}" method="POST">

                    @csrf
                      
                    <center>
                      <div class="input-group mb-1" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>

                        <input type="number" autocomplete="off" class="form-control text-center" name="cantidad" value="{{ $item->quantity }}" min="1" readonly>


                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                      </div>
                    </center>

                     <input type="submit" class="btn btn-primary" value="Actualizar">
                    </form>

                  </td>

                  <!-- --------------------------------------------------------------------------------------- -->
                  
                  <td class="h4 text-black"> {{ $item->price * $item->quantity }} €</td>

                <td><a href="{{ url('/delete_carrito/' . $item->id) }}" class="btn btn-primary btn-sm">X</a></td>
                </tr>
                
                @endforeach
                
              </tbody>
            </table>

            @endif
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">

            <div class="col-md-6">
              <button onclick="location.href='{{url('/productos')}}'" class="btn btn-primary btn-sm btn-block"><span class="icon icon-long-arrow-left"></span>Continuar Comprando</button>
            </div>

            @if(!Cart::isEmpty())

            <div class="col-md-6">
              <button onclick="location.href='{{url('/vaciar_carrito')}}'" class="btn btn-dark btn-sm btn-block">Vaciar Carrito</button>
            </div>

            @endif

          </div>
          <div class="row">
            <div class="col-md-12">
              <label class="text-black h4" for="coupon">Cupón</label>
              <p>Ingrese su código de cupón si tiene uno.</p>
            </div>
            <div class="col-md-8 mb-3 mb-md-0">
              <input type="text" class="form-control py-3" id="coupon" placeholder="Código del cupón">
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary btn-sm">Aplicar Cupón</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">Resumen Carrito</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Base Imponible</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{ number_format(Cart::getTotal() / 1.21,2) }} €</strong>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">IVA (21%)</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{  number_format(Cart::getTotal() * 0.21,2) }} €</strong>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Gastos de Envío</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black"><?php $envio=4.99; echo $envio; ?> €</strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">{{ Cart::getTotal() + $envio }} €</strong>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary btn-lg py-3 btn-block" onclick="location.href='{{url('/proceder_compra')}}'">Realizar Compra</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@include("footer")