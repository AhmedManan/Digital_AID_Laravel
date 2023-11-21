<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>DIGITAL AID: ADMIN</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="/css/user/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/css/user/ready.css">
    <link rel="stylesheet" href="/css/user/demo.css">
    <script type="text/javascript" src="/qrcode.js"></script>
    <script type="text/javascript" src="/js/instascan.min.js"></script>
    <script type="text/javascript" src="/html2canvas.js"></script>

    <script src="/jquery.min.js"></script>
</head>

<body>
    @include('admin/admindashboard')
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <video width="500" height="250" id="preview"></video>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-3 col-6">
                                            <input readonly class="form-control username" type="text" value="{{$userinfoprofile}}">
                                            <!-- <input class="form-control consumerclass" type="text" name="qr_code" value="" id="value"> -->
                                        </div>
                                    <br/>
                                        <div class="col-md-3 col-6">
                                            <input class="form-control consumerclass" type="text" name="qr_code" value="" id="value">
                                            <br>
                                            <input type="button" class="btn btn-default" value="Create Random String" onClick="randomString();">&nbsp;
                                            <!-- <input type="text" name="randomfield" value=""> -->
                                            <br>
                                            <br>
                                            <button id="btn-Preview-Image" class="btn btn-default" onClick="createQrCode()">Genarate Card</button>
                                            <a id="btn-Convert-Html2Image" href="">Download</a>
                                            <br>
                                        </div>
                                        <div>
                                            <br>
                                            <div id="html-content-holder" style="visibility: hidden; background-color: #ffdaa260; color: #00cc65; width: 350px; padding-left: 25px; padding-top: 10px;">
                                                <strong>DIGITAL AID</strong><hr/>
                                                <div class="d-flex justify-content-start">
                                                    <div class="image-container">
                                                        <img src="/img/user/profilepic/{{$userinfoprofile}}.jpg" id="imgProfile" style="width: 100px; height: 100px" class="img-thumbnail" />
                                                    </div>
                                                    <div class="userData ml-3">
                                                        <h6 style="color: #3e4b51;">
                                                            {{$unverifieduser->first_name}} {{$unverifieduser->last_name}}
                                                        </h6>
                                                        <p>Join Date: {{$unverifieduser->joindate}}</p>
                                                        <span class="">{{$unverifieduser->usertype}}</span>
                                                    </div>
                                                </div>
                                                <p style="color: #000000;">
                                                    Address: {{$unverifieduser->house}}, {{$unverifieduser->ward}}, {{$unverifieduser->union}}, {{$unverifieduser->upzilla}}, {{$unverifieduser->zilla}}, {{$unverifieduser->division}}
                                                </p>
                                                <p style="color: #3e4b51;">
                                                    <div id="qrcode"></div>
                                                    <br>
                                                </p>
                                            </div>
                                            <div id="verifybutton"></div>
                                            <!-- <input id="btn-Preview-Image" type="button" value="Preview"/> -->
                                            <!-- <h3>Preview :</h3>
                                            <div id="previewImage"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
<script>
    let scanner = new Instascan.Scanner(
        {
            video: document.getElementById('preview')
        }
    );
    scanner.addListener('scan', function (content) {
        // alert('Escaneou o conteudo: ' + content);
        // window.open(content, "_blank");
        $('.consumerclass').val(content);
    });
    Instascan.Camera.getCameras().then(cameras => {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error("No camera found");
        }
    });

    // generate qr code    
    function createQrCode() {
        var userInput = document.getElementById('value').value;
    var element = $("#html-content-holder"); // global variable
        element.css('visibility','visible');
        $('#verifybutton').html("<button id='verifyuserbtn' onClick='verifysubmit()' class='btn btn-success'>Verify user</button>");
        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 256,
            height: 256,
            colorDark: "black",
            colorLight: "white",
            correctLevel: QRCode.CorrectLevel.H
        });
    }

</script>

<script>

    function verifysubmit(){

        console.log("lopp");
    var qrcode= $('.consumerclass').val();
    var username= $('.username').val();
    $.ajax({
    url:'/admin/cardscan',
    data: {qrval: qrcode,username: username},
    method:'POST',
    contentType: 'application/x-www-form-urlencoded',
    success: function(response){
        alert("user verified!!!");
        window.location.href = "/admin";
    },
    error: function(err){
        console.log(err)
    }
});

    }
// $('#verifyuserbtn').click(function(e){
// //     console.log("lopp");
// //     var qrcode= $('.consumerclass').val();
// //     var username= $('.username').val();
// //     $.ajax({
// //     url:'/admin/cardscan',
// //     data: {qrval: qrcode,username: username},
// //     method:'POST',
// //     contentType: 'application/x-www-form-urlencoded',
// //     success: function(response){
     
// //     },
// //     error: function(err){
// //         console.log(err)
// //     }
// // });


// })
</script>

<script>
    
    $(document).ready(function(){
    
        
    var element = $("#html-content-holder"); // global variable
    var getCanvas; // global variable
     
        $("#btn-Preview-Image").on('click', function () {
             html2canvas(element, {
             onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                 }
             });
        });
    
        $("#btn-Convert-Html2Image").on('click', function () {
        var imgageData = getCanvas.toDataURL("image/png");
        // Now browser starts downloading it instead of just showing it
        var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
        $("#btn-Convert-Html2Image").attr("download", "{{$unverifieduser->first_name}}_{{$unverifieduser->last_name}}.png").attr("href", newData);
        });
    
   
    });


    
    </script>
<!-- Random String -->
<script>
function randomString() {
	// var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	// var string_length = 30;
	// var randomstring = '';
	// for (var i=0; i<string_length; i++) {
	// 	var rnum = Math.floor(Math.random() * chars.length);
	// 	randomstring += chars.substring(rnum,rnum+1);
	// }
	// //  document.randform.qr_code.value = randomstring;
    // let r= (Math.random()).toString();
    var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i<30; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
    $('.consumerclass').val(result);

    }
</script>


<script src="/js/user/core/jquery.3.2.1.min.js"></script>
<script src="/js/user/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/js/user/core/popper.min.js"></script>
<script src="/js/user/core/bootstrap.min.js"></script>
<script src="/js/user/plugin/chartist/chartist.min.js"></script>
<script src="/js/user/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<!-- <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->
<script src="/js/user/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="/js/user/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/js/user/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="/js/user/plugin/chart-circle/circles.min.js"></script>
<script src="/js/user/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/js/user/ready.min.js"></script>
<script src="/js/user/demo.js"></script>

</html>