<!-- 
						<table class="table table-striped w-auto">

 						 <thead>
 						   <tr>
  						    <th>#</th>
  						    <th>Distributor Name</th>
  						    <th>Item</th>
  						    <th>quantity</th>
							<th>Assign Date</th>
  						  </tr>
  						</thead>
  						<tbody>
						  @foreach($distributed_inventory as $dist_i)
  						  <tr class="table-info">
  						    <th scope="row"></th>
  						    <td>{{$dist_i->d_username}}</td>
  						    <td>{{$dist_i->i_name}}</td>
  						    <td>{{$dist_i->i_quantity}}</td>
							<td>{{$dist_i->assign_date}}</td>
  						  </tr>
						@endforeach
						</tbody>
						</table>						 -->



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
   height: 300px;
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
   height: 300px;
}
</style>
</head>
<body>
<br>
<div style="height: 300px; overflow:scroll "  class="tab">
@foreach($distributor as $dist)
   <button class="demo" onclick="infofunc(event, '{{$dist->username}}')" id="current">{{$dist->username}}</button>
   @endforeach
</div>
@foreach($distributor as $dist)
<div id="{{$dist->username}}" class="demo2">
<p>Following the goods in <a href="/admin/viewprofile/{{$dist->username}}">{{$dist->username}}</a>'s inventory:</p>
   <p>
   						<!-- Distribution Table -->
<table  class="table table-striped w-auto">

<!--Table head-->
<thead>
  <tr>
	<th>Item</th>
	<th>quantity</th>
  <th>Assign Date</th>
  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
@foreach($distributed_inventory as $dist_i)
@if($dist_i->d_username==$dist->username)
  <tr class="table-info">
	<td>{{$dist_i->i_name}}</td>
	<td>{{$dist_i->i_quantity}}</td>
  <td>{{$dist_i->assign_date}}</td>
  </tr>
  @endif
@endforeach
</tbody>
</table>						
<!-- Distribution Table -->
   </p>
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
</body>
</html>