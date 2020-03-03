@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif


<div class="site-section">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="float-md-left mb-4"><h2 class="text-black h3">CONTACTO</h2></div>
            </div>
         

        <div class="col-md-4 ml-auto">
            <div class="p-4 border mb-3">
                <span class="icon-map-marker text-primary h3"></span>
                <span class="text-primary h4"><b>Dirección</b></span>
                <p class="mb-0">C/Cabezas Rubias, España, Andalucía, Huelva</p>
            
            </div>
        </div>

        <div class="col-md-4 ml-auto">
            <div class="phone p-4 border mb-3">
                <span class="icon-phone text-primary h3"></span>
                <span class="text-primary h4"><b>Teléfono</b></span>
                <p class="mb-0">+34 672 77 77 77</p>
            </div>
        </div>

        <div class="col-md-4 ml-auto">
            <div class="p-4 border mb-3">
                <span class="icon-envelope-open text-primary h3"></span>
                <span class="text-primary h4"><b>Email</b></span>
                <p class="mb-5">droneshop@droneshop.com</p>
            </div>
        </div>
    </div>

    <form action="#">

        <div class="row">
            <div class="col-md-12 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">FORMULARIO DE CONTACTO</h2>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Teléfono <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_fname" name="c_fname">
                    </div>
                    <div class="col-md-6">
                      <label for="c_lname" class="text-black">Asunto <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_lname" name="c_lname">
                    </div>
                  </div>
  
  
                <div class="form-group">
                  <label for="c_order_notes" class="text-black">Consulta</label>
                  <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Escriba su consulta ..."></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg ">Enviar</button>
                </div>

                </div>
  
              </div>
            
            </div>
                
        </div>
    </form>
    </div>
</div>




@include("footer")