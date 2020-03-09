@if(Auth::check())
    @include("cliente/header")
@else
    @include("invitado/header")
@endif

<div class="container">
    <div class="row">

        @if (Session::has('importar'))
              <div class="alert alert-success" role="alert">
                Los datos se han importado con éxito
              </div>
        @endif
        @if (Session::has('errors'))
              <div class="alert alert-danger" role="alert">
                <strong>Formato Incorrecto, </strong>El formato del documento tiene que ser <strong>.xml</strong>
              </div>
        @endif

        <div class="col-md-12">
            <form enctype="multipart/form-data" action="{{ url('/importando_productos') }}" method="POST">
            @csrf  
            <h3> Importar Productos</h3>
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
        
                    <div class="col-md-12 mb-5">
                        <label for="importar" class="text-black h4">Importar XML: <span class="text-danger"></span></label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="file" name="file" id="file">       
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Importar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include("footer")