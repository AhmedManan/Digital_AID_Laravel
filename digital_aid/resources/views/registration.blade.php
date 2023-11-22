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

<!-- <body onload="createCaptcha()"> -->
<body onload="createCaptcha()">

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
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/about">About</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/contact">Contact</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/registration">Registration</a>
          </li>
          <li>
            <!-- login form  -->
            <form method="POST" action="/login">
         
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="username" name="username" value= "">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                      </div>
                  </div>
                  <div class="col">
                    <input type="password" class="form-control" placeholder="password" name="password" value= "">
                    <!-- <a class="nav-link"  href="/resetpassword">forget password?</a> -->
                  </div>
                  <div class="col">
                  <button type="submit" class="btn btn-primary my-1" value="POST">login</button>
                  </div>
                </div>
              </form>
              <!-- login form end -->
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Registration</span>
            </h2>
            <div style="width: 500px;" class="table-responsive my-table table-hover">
            <table>
            <!-- <form method="POST" action="/registration" id="regform" enctype="multipart/form-data" onsubmit="validateCaptcha()"> -->
            <form method="POST" action="/registration" id="regform" enctype="multipart/form-data">
           <tr>
           <th>Photo</th>
           <td><div  class="box">
            <div class="js--image-preview"></div>
            <div class="upload-options">
              <label>
                <input type="file" name="file" class="image-upload" accept="image/*" />
              </label>
            </div>
          </div></td>

                   <!-- <td> <input type="file" name="file" class="form-control-file"></td> -->
                   
         </tr>
          <th>Name:</th>
          <td><input required type="text" class="form-control" id="fname" name="first_name" placeholder="First name" value="{{old('first_name')}}"></td>
          <td><input required type="text" class="form-control" id="lname" name="last_name" placeholder="Last name" value="{{old('last_name')}}"></td>
         </tr>
         <tr>
         <th>Username:</th>
         <td><input required type="text" class="form-control" id="uname" name="username" placeholder="username" value="{{old('username')}}"></td>
         </tr>
         <tr>
          <th>Email:</th>
         <td><input required type="text" class="form-control" id="ename" name="email" value="{{old('email')}}"></td>
         </tr>
         <tr>
          <th>Password:</th>
         <td><input required type="password" class="form-control"  name="password" value="{{old('password')}}"></td>
         <td>
          <input required type="password" class="form-control" placeholder="Confirm Password" value="" name="password_confirmation">

         </td>
         </tr>
         <!-- <tr>
         <th>Usertype:</th>
         <td><input type="text" class="form-control" id="name" name="usertype" value=""></td>
         </tr> -->
         <tr>
          <th>Gender:</th>
         <td>
         <select required name="gender" class="browser-default custom-select">
            <option  value=""></option>
            <option  value="male">male</option>
 					  <option  value="female">female</option>
 						<option  value="others">others</option>
         </td>
         </tr>
         <tr>
          <th>Phone:</th>
         <td><input required type="text" class="form-control" id="name" name="phone" value="{{old('phone')}}"></td>
         </tr>
         <tr>
          <th>Date of Birth:</th>
          <td>
          <input required class="form-control" type="date" name="date" value="{{old('date')}}" id="example-date-input">
          </td>
          </tr>
         <tr>
          <th>Nid No:</th>
         <td><input required type="text" class="form-control" id="nid_no" name="nid_no" value="{{old('nid_no')}}"></td>
         </tr>
         <tr>
          <th>Address:</th>
          <td><input required type="text" style="text-transform: uppercase;" class="form-control" id="division" name="division" placeholder="Enter Division" value="{{old('division')}}"></td>
          <td><input required type="text" style="text-transform: uppercase;"  class="form-control" id="zilla" name="zilla" placeholder="Enter Zilla" value="{{old('zilla')}}"></td>
         </tr>
         <tr>
          <th></th>
          <td><input required type="text" style="text-transform: uppercase;"  class="form-control" id="upzilla" name="upzilla" placeholder="Enter Upzilla" value="{{old('upzilla')}}"></td>
          <td><input required type="text" style="text-transform: uppercase;" class="form-control" id="union" name="union" placeholder="Enter Union / City Co." value="{{old('union')}}"></td>
         </tr>
         <tr>
          <th></th>
          <td><input required type="text" style="text-transform: uppercase;" class="form-control" id="ward" name="ward" placeholder="Enter Ward" value="{{old('ward')}}"></td>
          <td><input required type="text" style="text-transform: uppercase;" class="form-control" id="road" name="road" placeholder="Enter Road / House" value="{{old('road')}}"></td>
         </tr>
         <tr>
         <th>Nid Photo</th>
         <td><div class="box">
          <div class="js--image-preview"></div>
          <div class="upload-options">
            <label>
              <input required type="file" name="filenid" class="image-upload" accept="image/*" />
            </label>
          </div>
        </div></td>
           <!-- <td><input type="file" name="filenid" class="form-control-file"></td> -->
          </tr>

          <tr><th></th>
            <td>
              <div id="captcha">
              </div>
              <input required type="text" class="form-control" name="captchatextbox"  placeholder="Captcha" id="cpatchaTextBox"/> 
              <input type="hidden" name="captchacode"  id="captchacode"/> 
              </td>
          </tr>
          <tr>
          <th></th>
          <td>
          <label> By continuing, you agree to Digital AID's <br> <a href="" data-toggle="modal" data-target="#myModal">Terms of Service and Privacy Policy</a> </label>
          </td>
          </tr>
         <tr>
          <th>Action</th>
         <td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
         </tr>
         </form>
        </table>
        </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Terms of Service</h4>
        </div>
        <div class="modal-body">
          <p>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern [business name]'s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.

The use of this website is subject to the following terms of use:

The content of the pages of this website is for your general information and use only. It is subject to change without notice.
This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [insert list of information].
Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.
Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).
Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Broti, Gazi Manan Ahmed
        <br>
        Badhan, Sadia Afrin
        <br>
        Fatemi, Omer Fahim
      </p>
    </div>
  </footer>

  @if(Session::has('errorCaptcha'))

  <!-- {{ Session::get('error')}} -->
  <script>
    alert("Wrong Captcha !!!")
  </script>
    {{Session::flush('errorCaptcha')}}

@endif

  @if(Session::has('registration'))

  <!-- {{ Session::get('error')}} -->
  <script>
    alert("{{Session::get('registration')}}")
  </script>
    {{Session::flush('registration')}}

@endif

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

@include('front-end/photoupload')

@include('front-end/capacha')

</html>
