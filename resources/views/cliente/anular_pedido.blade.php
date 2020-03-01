@include("cliente/header")


<div class="site-section">
    <div class="container">
      
          
          <div class="row mb-5">
            <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">¿Está seguro de que desea eliminar el pedido con identificador: <b>{{$id}}</b>?</h2>
              <div class="p-3 p-lg-5 border">
                <form action="{{url('/pedido_anulado/' . $id)}}" id="formAdd" method="get" enctype="multipart/form-data">
                    <input class="btn btn-success" type="submit" value="SI" name="si">
                    <a class="btn btn-danger" href="{{url('/mis_pedidos')}}">NO</a>
                </form>
        </div>
      </div>

    </div>
  </div>


@include("footer")