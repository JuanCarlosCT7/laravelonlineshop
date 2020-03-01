@include("cliente/header")


<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <span class="icon-check_circle display-3 text-success"></span>
        <h2 class="display-3 text-black">Gracias por realizar su compra!</h2>
        <p class="lead mb-5">Tu pedido ha sido realizado con éxito.</p>
        <p><a href=" {{url('/')}} " class="btn btn-sm btn-primary">Volver a la tienda</a></p>
      </div>
    </div>
  </div>
</div>


@include('footer')