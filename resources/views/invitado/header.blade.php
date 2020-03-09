<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Drone Shop - Tu Web de Drones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/fonts/icomoon/style.css')}}"/>

    <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/magnific-popup.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/jquery-ui.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/assets/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('/assets/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">

    <style>
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      
      /* Firefox */
      input[type=number] {
        -moz-appearance:textfield;
      }
      </style>
    
  </head>
  
<!-- ---------------------------------------------------------------------------------------------- -->
  
  <body>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtuQVgZPHI2RUtNDLNfeZOa2K5Q3LaxMc&language=ar&region=EG">
    </script>

  
  <div class="site-wrap">
  
  <!-- HEADER -->
  
    <header class="site-navbar" role="banner">
    

  <!-- OPCIONES -->
        <div class="container">
              <div class="site-top-icons">
                <ul class="header-links float-right">

               @if (Auth::check() && Auth::user()->tipo=='admin')
              
                  <li class="dropdown" ><a href="#" class=" dropdown-toggle" data-toggle="dropdown">Administrar<span></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="{{url('/productos')}}" class="administrarproductos">Productos</a></li>
                          <li><a href="{{url('/categorias')}}" class="administrarcategorias">Categorías</a></li><br>
                          <li><a href="{{url('/pedidos')}}" class="administrarpedidos">Pedidos</a></li>
                      </ul>
                  </li>
                  
                @endif
                
               @if (Auth::check())
                  <li><a href="{{url('/mis_pedidos')}}"><span class="icon icon-list-alt"></span> Mis pedidos</a></li>
                <li><a href="{{url('/datos_usuario')}}"><span class="icon icon-user"></span> {{Auth::user()->username}}</a></li>
                  <!--<li><a href="{{url('/datos_usuario')}}"><span class="icon icon-user"></span>Datos Envío</a></li> -->

                  <li><a href="{{url('/cerrar_sesion')}}"></span class="icon icon-power-off"></span> Cerrar Sesión</a></li>

                @endif

                </ul>
              </div>
          </div>

  <!-- OPCIONES -->



  <!-- NAVBAR-TOP -->

      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Buscar">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div>
                <a href="{{url('/')}}" class="js-logo-clone"><img src="{{asset('/assets/images/logo.png')}}" width="155" height="70"></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>

                @if (!Auth::check())
                  <li><a href="{{url('/login')}}"> Iniciar Sesión <span class="icon icon-person"></span></a></li>
                  <li>

                @endif

                    <a href="{{url('/carrito')}}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                    <span class="count">{{ Cart::getTotalQuantity() }}</span> Carrito
                    </a>
                  </li> 
                  
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 

      <!-- NAVBAR-TOP -->

      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children active">
              <li><a href="{{url('/')}}">Inicio</a></li>
            </li>
            <li class="has-children">

            <!-- Inlucimos el modelo en la vista -->

              <a href="{{url('/categorias')}}">Categorías</a>
              <ul class="dropdown">

             @foreach (session("categorias") as $categoria)
                  <li><a href="{{url('/categoria/'. $categoria['nombre'])}}">{{$categoria['nombre']}}</a></li>
             @endforeach

                <!-- 
                    <li><a href="#">Racing Drones</a></li>
                    <li><a href="#">Filmación</a></li>
                    <li><a href="#">Iniciación</a></li>
                -->
              </ul>
            </li>
            <li><a href="{{url('/productos')}}">Productos</a></li>
            <li><a href="{{url('/contacto')}}">Contacto</a></li>
          </ul>
        </div>
      </nav>
    </header>
	
    <!-- HEADER -->