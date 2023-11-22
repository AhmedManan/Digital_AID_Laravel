<br>
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
<div style="height: 250px;" class="table-responsive my-table table-hover">
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
</div>
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