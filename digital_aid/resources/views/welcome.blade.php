<?php

if($login_failed=="true"){ ?>
<script type='text/javascript'>alert('Login Failed!');</script>
<?php
   session()->put('login_failed','false');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Digital Aid</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('public/css/business-casual.min.css')}}" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Digital Aid</span>
    <span class="site-heading-lower">We Provide AID</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Digital Aid</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{url('/')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{url('/about')}}">About</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{url('/contact')}}">Contact</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{url('/registration')}}">Registration</a>
          </li>
          <li>
            <!-- login form  -->
            <form method="POST" action="{{url('/login')}}">
            @csrf
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="username" name="username" value= "{{ $login[0] }}">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline" {{ $login[2] }}>
                        <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                      </div>
                  </div>
                  <div class="col">
                    <input type="password" class="form-control" placeholder="password" name="password" value= "{{ $login[1] }}">
                    <!-- <a class="nav-link"  href="/resetpassword">forget password?</a> -->
                  </div>
                  <div class="col">
                  <button type="submit" name="submit" class="btn btn-primary my-1" value="POST">login</button>
                  </div>
                </div>
              </form>
              <!-- login form end -->
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{asset('public/img/intro.jpg')}}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">Emergency</span>
            <span class="section-heading-lower">AID</span>
          </h2>
          <p class="mb-3">It is basically an online platform that has been planned with the intention of making the process of distributing relief products efficient. During the crisis of Bangladesh, most of the the middle-class people and the poor ones left without earning. The government came forward with the intention of helping those who are suffering.
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="{{url('/registration')}}">Need Support</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Our Promise</span>
            </h2>
            <p class="mb-0">Helping the needy will always be our first priority</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Broti, Manan Ahmed
        <!-- <br>
        Badhan, Sadia Afrin
        <br>
        Fatemi, Omer Fahim -->
      </p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
