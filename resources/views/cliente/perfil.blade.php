@include("cliente/header")

<div class="site-section">
	
    <div class="container">
      <div class="row">

            @if (Session::has('success'))
              <div class="alert alert-success" role="alert">
                Los datos se han actualizado con éxito
              </div>
            @endif
      
        <div class="col-md-12 mb-4">
          <h2 class="h3 mb-3 text-black">Mi Perfil:</h2>
        </div>
        
        <div class="col-md-12">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
  
                  <div class="col-md-4">
                    <label for="nombre" class="text-black">Nombre: <span class="text-danger"></span></label>
                  </div>
                  <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre"  value="{{ Auth::user()->nombre }}" readonly>
                  </div><br>
  
                  <div class="col-md-4">
                    <label for="apellidos" class="text-black">Apellidos: <span class="text-danger"></span></label>
                  </div>
                  <div class="col-md-6">
                    <input id="apellidos" type="text" class="form-control" name="apellidos"  value="{{ Auth::user()->apellidos }}" readonly>
                  </div>
  
                  <div class="col-md-4">
                    <label for="dni" class="text-black">DNI: <span class="text-danger"></span></label>
                  </div>
                  <div class="col-md-6">
                    <input id="dni" type="text" class="form-control" name="dni"  value="{{ Auth::user()->dni }}" readonly>  
                  </div>
  
                  <div class="col-md-4">
                    <label for="direccion" class="text-black">Dirección: <span class="text-danger"></span></label>
                  </div>
                  <div class="col-md-6">
                    <input id="direccion" type="text" class="form-control" name="direccion"  value="{{ Auth::user()->direccion }}" readonly> 
                  </div>  
  
                  <div class="col-md-4">
                    <label for="email" class="text-black">Email:<span class="text-danger"></span></label>
                  </div>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                  </div>                    

                </div>
            </div>
        </div>  
        </div>
    </div>
</div>

@include("footer")