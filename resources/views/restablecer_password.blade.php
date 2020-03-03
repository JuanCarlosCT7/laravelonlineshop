
@include("invitado/header")


<div class="site-section">
	
    <div class="container">
      <div class="row">
      
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black">REESTABLECER CONTRASEÑA</h2>
        </div>
        
        <div class="col-md-6">

          <form action="" method="POST">
            
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
            
                <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
  
                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
               
                  </div>
                
                <div class="col-md-6">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="ENVIAR">
                </div>
              </div>
            </div>
          </form>
        </div>
        
       </div>
      </div>
      
    </div>

@include("footer")