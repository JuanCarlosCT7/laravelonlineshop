@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif

<div class="site-wrap">
  
	<div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Productos Destacados</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

            @foreach ($destacados as $destacado)

              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <a href="{{url('/producto/'. $destacado['id'])}}"><img src="{{asset('/'. $destacado['imagen'])}}" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h2><a href="{{url('/producto/'. $destacado['id'])}}">{{$destacado['nombre']}}</a></h2>
                    
                    <h4>{{$destacado['nombre_categoria']}}</h4>

                    <h3 class="font-weight-bold" style="color: black">{{$destacado['precio_venta']}}€ </h3><br>

                    <div class="add-to-cart">
                        <a class="add-to-cart-btn btn" href="{{url('/add_carrito/' . $destacado['id']) }}"><i class="icon icon-shopping_cart"></i> Añadir al Carrito</a>
                    </div>

                  </div>
                </div>
              </div>
            
              @endforeach


            </div>
          </div>
        </div>
      </div>
    </div>
    
	
  </div>

@include("footer")