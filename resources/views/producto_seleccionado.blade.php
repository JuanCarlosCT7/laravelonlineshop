@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif


<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('/'.  $producto_seleccionado['imagen'])}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{ $producto_seleccionado['nombre']}}</h2>
          <p>{{ $producto_seleccionado['descripcion']}}</p>
          
          <p><strong class="text-primary h4">{{ $producto_seleccionado['precio_venta']}}€</strong></p>
          
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
              <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
          </div>

          </div>
          <p><a href="{{ url('/add_carrito/' . $producto_seleccionado['id']) }}" class="buy-now btn btn-sm btn-primary">Añadir al Carrito</a></p>
        </div>


@include("footer")