@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif


<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Todos los Productos</h2></div>
             
            </div>
          </div>
          <div class="row mb-1">

        @foreach ($productos as $producto)

            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">

                <figure class="block-4-image">
                  <a href="{{url('/producto/'. $producto['id'])}}"><img src="{{asset('/'. $producto['imagen'])}}" alt="Image placeholder" class="img-fluid"></a>
                </figure>

                <div class="block-4-text p-4">

                  <h3><a href="{{url('/producto/'. $producto['id'])}}">{{$producto['nombre']}}</a></h3>
                  
                  <p class="font-weight-bold" style="color: black">{{$producto['precio_venta']}}€</p>

                  <div class="add-to-cart">
                      <a class="add-to-cart-btn btn" href="{{ url('/add_carrito/' . $producto['id']) }}"><i class="icon icon-shopping_cart"></i> Añadir al Carrito</a>
                  </div>

                </div>
              </div>
            </div>

        @endforeach

          <!-- ----------------------------------------------------------- -->
        

          <!-- ----------------------------------------------------------------- -->

           


          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
                <ul class="pagination justify-content-md-center">
                    
                    {!! $productos->render() !!}
                

                <!-- 
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>

              -->
                </ul>
            </div>
          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a href="{{url('/categoria/Racing')}}" class="d-flex"><span>Racing</span> <span class="text-black ml-auto"></span></a></li>
              <li class="mb-1"><a href="{{url('/categoria/Filmacion')}}" class="d-flex"><span>Filmación</span> <span class="text-black ml-auto"></span></a></li>
              <li class="mb-1"><a href="{{url('/categoria/Iniciacion')}}" class="d-flex"><span>Iniciación</span> <span class="text-black ml-auto"></span></a></li>
            </ul>
          </div>
 

          <div class="border p-4 rounded mb-4">
            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtrar por Precio</h3>
              <div id="slider-range" class="border-primary"></div>
              <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
            </div>


            <div class="mb-4">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-warning color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Naranja</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Azul</span>
              </a>
              <a href="#" class="d-flex color-item align-items-center" >
                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Morado</span>
              </a>
            </div>

          </div>
        </div>
      </div>

      
    </div>
  </div>

  
</div>

@include("footer")