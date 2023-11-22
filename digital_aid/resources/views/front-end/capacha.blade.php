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