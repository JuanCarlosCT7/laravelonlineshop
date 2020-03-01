@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif


<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

        
          <div class="row mb-1">


            <div class="col-sm-6 col-lg-12 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">

                <figure class="block-4-image">
                  <a href="{{url('/categoria/Racing')}}"><img src="{{asset('/assets/images/cat_racing.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                </figure>

                <figure class="block-4-image">
                    <a href="{{url('/categoria/Filmacion')}}"><img src="{{asset('/assets/images/cat_filmacion.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                </figure>

                <figure class="block-4-image">
                    <a href="{{url('/categoria/Iniciacion')}}"><img src="{{asset('/assets/images/cat_iniciacion.jpg')}}" alt="Image placeholder" class="img-fluid"></a>
                </figure>

              </div>
            </div>     

          </div>
          <div class="row" data-aos="fade-up">
            <div class="col-md-12 text-center">
                <ul class="pagination justify-content-md-center">
                
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