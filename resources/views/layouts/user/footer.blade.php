<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4 mt-5" style="  background-color: #3E4551">

    <!-- Footer Links -->
    <div class="container text-center text-md-left" style="color:#fff">
  
      <!-- Grid row -->
      <div class="row">
  
        <!-- Grid column -->
        <div class="col-md-4 mx-auto">
  
          <!-- Content -->
          <a class="my-0 mr-md-auto" href="/home"> <img src="<?php echo asset('img/logo.svg'); ?>"></a>
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">RikkeiSolf Content</h5>
         <p style="color:#fff">Vietnam,Da Nang</p>
         <hr>
          <p style="color:#fff" >11th Floor, VietNam News Agency Building, 81 Quang Trung St., Hai Chau Dist
          Danang, VietNam </p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none " style="color:#fff">
  
        <!-- Grid column -->
        <div class="col-md mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-5 mb-5"  href="#!">Hanoi</h5>
     
          <ul class="list-unstyled">
            <li>
              <a>21st Floor, Handico Tower, Pham Hung St., Nam Tu Liem District
                Hanoi, Vietnam</a>
            </li>
          </li>
          <li class="py-2 md-2">
          <i class="fa fa-phone"></i>
          <span class="ml-1" style="color:#fff">(+84) 28 225 380 04</span>
        </li>
        <br>
        <li class="py-2 md-2">
          <i class="far fa-envelope"></i>
          <span class="ml-1" style="color:#fff">contact@rikkeisoft.com</span>
        </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none">
  
        <!-- Grid column -->
        <div class="col-md mx-auto">
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-5 mb-5">Hochiminh</h5>
  
          <ul class="list-unstyled">
            <li>
              <a>7th Floor Maritime Safety South Building, 42 Tu Cuong St., Ward 4, Tan Binh Dist</a>
            </li>
            <li class="py-2 md-2">
            <i class="fa fa-phone"></i>
            <span class="ml-1" style="color:#fff">(+84) 28 225 380 04</span>
          </li>
          <br>
          <li class="py-2 md-2">
            <i class="far fa-envelope"></i>
            <span class="ml-1" style="color:#fff">contact@rikkeisoft.com</span>
          </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
        <div class="row">
          <div class="col-md-4 mx-auto ml-10" style="padding-left: 62.50cm;">
          </div>
        <!-- Grid column -->
        <div class="col-md-8 mx-auto ml-10" >
  
          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Japan</h5>
  
          <ul class="list-unstyled">
            <li>
              <a>〒108-0014 東京都港区芝 4-13-4 田町第16藤島ビル3階</a>
            </li>
            <br>
          </li>
          <li class="py-2 md-2">
          <i class="fa fa-phone"></i>
          <span class="ml-1" style="color:#fff">(+84) 28 225 380 04</span>
        </li>
        <br>
        <li class="py-2 md-2">
          <i class="far fa-envelope"></i>
          <span class="ml-1" style="color:#fff">contact@rikkeisoft.com</span>
        </li>
          </ul>
  
        </div>
        <!-- Grid column -->
        </div>
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    
  
    <!-- Call to action -->
    @if (Auth::check())


    @else
    <hr>
    <ul class="list-unstyled list-inline text-center py-2">
      <li class="list-inline-item">
        <h5 class="mb-1" style="color:#fff;">Register for free</h5>
      </li>
      <li class="list-inline-item">
        <a href="{{ route('login') }}" class="btn btn-danger btn-rounded">Sign up!</a>
      </li>
    </ul>
    <!-- Call to action -->
  
    <hr>
    
    

@endif
    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
        
      <!-- Grid column -->
      <div class="col-md-12">
        <div class="mb-2 center" style="position: static;">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
          </a>
          <!--Pinterest-->
          <a class="pin-ic">
            <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
          </a>
        </div>
      </div>
      <!-- Grid column -->
    </ul>
    <!-- Social buttons -->
    
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3"  style="background-color: rgba(0,0,0,0.2)">
      <p style="color:#fff;">Copyright © 2020 by <a href="https://rikkeisoft.com/en/people/#main-content">  Rikkeisoft Co.</a>., Ltd. All rights reserved</p>
     
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->

  
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script href="{{asset('src/readMoreJS.min.js')}}"></script>