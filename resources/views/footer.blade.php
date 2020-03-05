	<!-- FOOTER -->

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navegaciones</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Sell online</a></li>
                  <li><a href="#">Features</a></li>
                  <li><a href="#">Shopping cart</a></li>
                  <li><a href="#">Store builder</a></li>
                </ul>
              </div>
              <?php
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', 'http://ip-api.com/json/?lang=es&fields=country,countryCode,region,regionName,city%27%27');
                $localizacion = json_decode($response->getBody());
              ?>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  @foreach ($localizacion as $item)
                      <li><a href="#"><span class="icon icon-map-marker"></span> {{$item}}</a></li>
                  @endforeach
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Point of sale</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li><a href="#">Software</a></li>
                </ul>
              </div>
            </div>
          </div>
         
           

          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promoción</h3>
            <a href="#" class="block-6">
              <img src="{{asset('/assets/images/banner002.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Encuentra tu Drone</h3>
              <p>Del 15 al 25 de Junio, 2019</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Información de Contacto</h3>
              <ul class="list-unstyled">
                <li class="address">C/Cabezas Rubias, España, Andalucía, Huelva</li>
                <li class="phone"><a href="#">+34 672 77 77 77</a></li>
                <li class="email">droneshop@droneshop.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Suscribir</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="OK">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
	
	<!-- FOOTER -->
	
  </div>

  <script src="{{asset('/assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('/assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('/assets/js/aos.js')}}"></script>

  <script src="{{asset('/assets/js/main.js')}}"></script>
    
  </body>
</html>