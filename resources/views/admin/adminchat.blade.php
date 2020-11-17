<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
   box-sizing: border-box
}
.tab {
   float: left;
   border: 1px solid blue;
   background-color: black;
   width: 20%;
   height: 550px;
}
.tab button {
   display: block;
   background-color: inherit;
   color: white;
   padding: 22px 16px;
   width: 100%;
   border: none;
   outline: none;
   text-align: left;
   cursor: pointer;
   transition: 0.3s;
   font-size: 17px;
}
.tab button:hover {
   background-color: gray;
}
.tab button.active {
   background-color: #006400;
}
.demo2 {
   float: left;
   padding: 0px 10px;
   border: 1px solid;
   width: 70%;
   border-left: none;
   height: 550px;
}
</style>
</head>
<body>
<br>
<div style="height: 550px; overflow:scroll "  class="tab">
@foreach($result as $sender)
   @if($sender->username==$sentby)
   <button class="demo" onclick="infofunc(event, '{{$sender->username}}')" id="current">{{$sender->username}}</button>
   @else
   <button class="demo" onclick="infofunc(event, '{{$sender->username}}')">{{$sender->username}}</button>
   @endif
   @endforeach
</div>
@foreach($result as $sender)
<div id="{{$sender->username}}" class="demo2">
<p><a href="/admin/viewprofile/{{$sender->username}}">{{$sender->username}}</a>'s Inbox:</p>
   <div style="height: 400px; overflow: scroll;" >

   @foreach($messages as $msg)
   @if($msg->sender==$sender->username || $msg->receiver==$sender->username)

   @if($msg->sender==$sender->username)
   <div class="container">
      <img src="/img/user/profilepic/{{$sender->username}}.jpg" alt="{{$sender->username}}" class="left">
      <p>{{$msg->text}}</p>
      <span class="time-right">{{$msg->date}}</span>
    </div>
    @else

    <div class="container darker">
      <img src="/img/user/profilepic/{{$user->username}}.jpg" alt="{{$user->username}}" class="right">
      <p>{{$msg->text}}</p>
      <span class="time-right">{{$msg->date}}</span>
    </div>

    @endif




    @endif
    @endforeach
    
    
   </div>
   <form method="post">



      <input type="text" placeholder="send message to {{$sender->username}}" name="text" class="form-control">
      <input type="hidden" value="{{$sender->username}}" name="receiver">
      
      <br>
      <input type="submit" class="btn btn-success" value="send">
   </form>
    
   
</div>
@endforeach
<script>
function infofunc(e, info) {
   var i, content, links;
   content = document.getElementsByClassName("demo2");
   for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
   }
   links = document.getElementsByClassName("demo");
   for (i = 0; i < links.length; i++) {
      links[i].className = links[i].className.replace(" active", "");
   }
   document.getElementById(info).style.display = "block";
   e.currentTarget.className += " active";
}
document.getElementById("current").click();
</script>
<!-- css -->
<style>
/* Chat containers */
.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
</style>
</body>
</html>