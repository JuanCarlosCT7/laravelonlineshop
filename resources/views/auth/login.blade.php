
@include("invitado/header")


<!-- LOGIN DE USUARIO -->
<div class="site-section">
	
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">
          <h2 class="h3 mb-3 text-black">INICIAR SESIÓN</h2>
        </div>
        
        <div class="col-md-6">
          <h2 class="h3 mb-3 text-black">REGISTRARSE</h2>
        </div>
        
        
        <div class="col-md-6">

          <form action="{{ route('login') }}" method="POST">

            @csrf
            
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="username" class="text-black">Nombre de Usuario </label>
                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-md-12">
                  <label for="password" class="text-black">Contraseña </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
              
              <div class="form-group row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="INICIAR SESIÓN"><br><br>


                  @if (Route::has('password.request'))
                            <a href="{{route('password.request')}}">¿Has olvidado la contraseña?  &nbsp;<span class="icon icon-lock"></span></a>
                    @endif


                </div>
              </div>
            </div>
          </form>
        </div>
  <!-- LOGIN DE USUARIO -->

  <!-- REGISTRO DE USUARIO -->
        <div class="col-md-6">

          <form action="{{ route('register') }}" method="POST">

            @csrf
            
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">



                <div class="col-md-12">
                  <label for="nombre" class="text-black">Nombre <span class="text-danger">*</span></label>
                  <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"  value="{{ old('nombre') }}">
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="col-md-12">
                  <label for="apellidos" class="text-black">Apellidos <span class="text-danger">*</span></label>
                  <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"  value="{{ old('apellidos') }}">

                      @error('apellidos')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>



                <div class="col-md-12">
                  <label for="dni" class="text-black">DNI <span class="text-danger">*</span></label>
                  <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"  value="{{ old('dni') }}">

                      @error('dni')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                </div>




                <div class="col-md-12">
                  <label for="direccion" class="text-black">Dirección <span class="text-danger">*</span></label>
                  <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion"  value="{{ old('direccion') }}">

                      @error('direccion')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                </div>




                <div class="col-md-12">
                  <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                  @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
             
                </div>





                <div class="col-md-12">
                  <label for="username_register" class="text-black">Nombre de Usuario <span class="text-danger">*</span></label>
                  <input id="username_register" type="text" class="form-control @error('username_register') is-invalid @enderror" name="username_register" value="{{ old('username_register') }}" autofocus>

                  @error('username_register')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
                




                <div class="col-md-12">
                  <label for="password_register" class="text-black">Contraseña <span class="text-danger">*</span></label>
                    <input id="password_register" type="password" class="form-control @error('password_register') is-invalid @enderror" name="password_register">

                      @error('password_register')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  
                    
                  </div>
                


                <div class="col-md-12">
                  <label for="password_register_confirmation" class="text-black">Confirmar Contraseña <span class="text-danger">*</span></label>
                  <input id="password_register_confirmation" type="password" class="form-control" name="password_register_confirmation">

                      @error('password_register')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  
                    
                  </div>
                </div>

                  
              <div class="form-group row">
                <div class="col-md-6">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="REGISTRAR">
                </div>
              </div>
            </div>
          </form>
        </div>

  <!-- REGISTRO DE USUARIO -->
      </div>
        
       </div>
      </div>
      
    </div>

@include("footer")