@include("cliente/header")


<div class="site-section">
    <div class="container">
      
          
          <div class="row mb-5">
            <div class="col-md-12">
            <center><h2 class="h3 mb-3 text-black">¿Está seguro de que desea darse de baja de DroneShop?</h2></center>
              <div class="p-3 offset-md-4 col-md-4 offset-md-4 border" >
                <center><form action="{{url('/baja_confirmada')}}" id="formAdd" method="get" enctype="multipart/form-data" >
                    <input style="width:100px" class="btn btn-success btn-lg" type="submit" value="SÍ" name="si">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="width:100px" class="btn btn-danger btn-lg" href="{{url('/datos_usuario')}}">NO</a>
                </form></center>
        </div>
      </div>

    </div>
  </div>


@include("footer")