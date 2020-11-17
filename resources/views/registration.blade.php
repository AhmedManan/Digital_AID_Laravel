<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Digital Aid</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<!-- <body onload="createCaptcha()"> -->
<body onload="createCaptcha()">

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Digital Aid</span>
    <span class="site-heading-lower">We Provide</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
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
                    <input type="text" class="form-control" placeholder="email or username" name="username" value= "">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                      </div>
                  </div>
                  <div class="col">
                    <input type="password" class="form-control" placeholder="password" name="password" value= "">
                  </div>
                  <button type="submit" class="btn btn-primary my-1" value="POST">login</button>
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
         <td><input type="submit" class="btn" name="submit" value="Submit"></td>
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
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script src='/imageupload.js'></script>

<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/icon?family=Material+Icons);
  @import url("https://fonts.googleapis.com/css?family=Raleway");
  /* body {
    font-family: "Raleway", sans-serif;
    height: 100vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    background-color: #eff5f6;
  } */
  
  .wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
  }
  
  h1 {
    font-family: inherit;
    margin: 0 0 .75em 0;
    color: #728c8d;
    text-align: center;
  }
  
  .box {
    display: block;
    min-width: 150px;
    height: 150px;
    margin: 10px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
    position: relative;
    
  }
  
  .upload-options {
    position: absolute;
    bottom: 0px;
    height: 45px;
    width: 100%;
    background-color: cadetblue;
    cursor: pointer;
    overflow: hidden;
    text-align: center;
    -webkit-transition: background-color ease-in-out 150ms;
    transition: background-color ease-in-out 150ms;
  }
  .upload-options:hover {
    background-color: #7fb1b3;
  }
  .upload-options input {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .upload-options label {

    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    width: 100%;
    height: 100%;
    font-weight: 400;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    overflow: hidden;
  }
  .upload-options label::after {
    content: 'add';
    font-family: 'Material Icons';
    position: absolute;
    font-size: 2.5rem;
    color: #e6e6e6;
    /* top: calc(50% - 2.5rem); */
    left: calc(50% - 1.25rem);
    z-index: 0;
  }
  .upload-options label span {
    display: inline-block;
    width: 50%;
    height: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    vertical-align: middle;
    text-align: center;
  }
  .upload-options label span:hover i.material-icons {
    color: lightgray;
  }
  
  .js--image-preview {
    height: 125px;
    width: 100%;
    position: relative center;
    overflow: hidden;
    background-image: url("");
    background-color: white;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .js--image-preview::after {
    content: "photo_size_select_actual";
    font-family: 'Material Icons';
    position: relative center;
    font-size: 4.5em;
    color: #e6e6e6;
    top: calc(50% - 3rem);
    left: calc(50% - 2.25rem);
    z-index: 0;
  }
  .js--image-preview.js--no-default::after {
    display: none;
  }
  
  i.material-icons {
    -webkit-transition: color 100ms ease-in-out;
    transition: color 100ms ease-in-out;
    font-size: 2.25em;
    line-height: 55px;
    color: white;
    display: block;
  }
  
  .drop {
    display: block;
    position: absolute;
    background: rgba(95, 158, 160, 0.2);
    border-radius: 100%;
    -webkit-transform: scale(0);
            transform: scale(0);
  }
  
  .animate {
    -webkit-animation: ripple 0.4s linear;
            animation: ripple 0.4s linear;
  }
  
  @-webkit-keyframes ripple {
    100% {
      opacity: 0;
      -webkit-transform: scale(2.5);
              transform: scale(2.5);
    }
  }
  
  @keyframes ripple {
    100% {
      opacity: 0;
      -webkit-transform: scale(2.5);
              transform: scale(2.5);
    }
  }
  </style>

<script >function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for(let i = 0; i < boxes.length; i++) {if (window.CP.shouldStopExecution(1)){break;}
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}
window.CP.exitedLoop(1);




/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}

//# sourceURL=pen.js
</script>
<!-- capacha -->
<style>
input[type=text] {
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
button{
  background-color: #4CAF50;
    border: none;
    color: white;
    padding: 12px 30px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
canvas{
  /*prevent interaction with the canvas*/
  pointer-events:none;
}
</style>

<script>
  var code;
function createCaptcha() {
  //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
  $('#captchacode').val(code);
}
function validateCaptcha() {
  event.preventDefault();
  var file=$('#file').val;
  var firstname=$('#first_name').val;
  var lastname=$('#last_name').val;
  var username=$('#username').val;
  var email=$('#email').val;
  var password=$('#password').val;
  var phone=$('#phone').val;
  var nid=$('#nid_no').val;
  var division=$('#division').val;
  var zilla=$('#zilla').val;
  var upzilla=$('#upzilla').val;
  var union=$('#union').val;
  var ward=$('#ward').val;
  var road=$('#road').val;
  var filenid=$('#filenid').val;


  if (document.getElementById("cpatchaTextBox").value == code) {
    $.ajax({
              url: '/registration',
              type: 'POST',
               data: {file:file, firstname:firstname, lastname:lastname, username:username, email:email, password:password,
               phone:phone, nid:nid, division:division, zilla:zilla, upzilla:upzilla, union:union, ward:ward, road:road, filenid:filenid},
              success: function (response) {

              },
              error: function (err) {
                console.log(err);
              }
            });
  }else{
    alert("Invalid Captcha. try Again");
    createCaptcha();
  }
}
</script>
</html>
