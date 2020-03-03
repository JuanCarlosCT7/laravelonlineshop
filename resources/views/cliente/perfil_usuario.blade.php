@include("cliente/header")

<div class="site-section">
	
    <div class="container">
      <div class="row">
      
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">Actualizar Datos Usuario: {{Auth::user()->username}}</h2>
        </div>
        
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
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="ACTUALIZAR">
                  </div>
                </div>
              </div>
            </form>
          </div>  

          <!-- ----------------------------------------------------------------------------------------------------- -->
          <div class="col-md-6">
              
              <div class="p-3 p-lg-5 border">
                
                <div class="form-group row">
                    <div class="col-md-6">
                    <a href="{{url('/mis_pedidos')}}"><input type="button" class="btn btn-primary btn-lg btn-block" value="MIS PEDIDOS"></a>
                    </div>

                    <div class="col-md-6">
                        <a href="{{url('/perfil')}}"><input type="button" class="btn btn-primary btn-lg btn-block" value="MI PERFIL"></a>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="offset-md-3 col-md-6 offset-md-3">
                    <a href="{{url('/cerrar_sesion')}}"><input type="button" class="btn btn-dark btn-lg btn-block" value="Cerrar Sesión"></a>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6">   
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <a href="{{url('/mis_pedidos')}}"><input type="button" class="btn btn-danger btn-lg btn-block" value="Dar de baja al usuario"></a>
                    </div>
                </div>

              </div>
         
          </div> 
          <!-- --------------------------------------------------------------------------------------------------- -->
        
       </div>
      </div>
      
    </div>

@include("footer")