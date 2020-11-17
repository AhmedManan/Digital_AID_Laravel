<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>DIGITAL AID: Distributor</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/css/user/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/css/user/ready.css">
	<link rel="stylesheet" href="/css/user/demo.css">
</head>
<body>
@include('distributor/distributordashboard')
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
                        <h4 class="page-title">Distribute</h4>
                        <!-- Camera Preview -->
                        
                                          <video width="500" height="250" id="preview"></video>

						<!-- Camera Preview End -->
						<!-- Table -->
						<input class="consumerclass" readonly type="text">



						<table class="table table-hover">
  						<thead>
    						<tr>
     						 <th scope="col">#</th>
     						 <th scope="col">ID</th>
     						 <th scope="col">Item</th>
							 <!-- <th scope="col">Assign Distributor</th> -->
     						 <th scope="col">Quantity (kg/litre)</th>
							 <th scope="col">Assign (kg/litre)</th>
							 <th scope="col">Action</th>
   						 </tr>
 						 </thead>
 						 <tbody>
						  @php
								$count=0;
						  @endphp
						  <form method="POST" action="/distributor/aid" >
						  @foreach($inventory as $result)
						  @php
							$inventoryCount-=1;
							$count++;
						  @endphp
						  <!-- <input type="hidden" name="id" value="{{$result->id}}"> -->
						  <input type="hidden" name="name{{$count}}" value="{{$result->i_name}}">

  						  <tr>
  						    <th scope="row"></th>
  						    <td>{{ $result->id  }}</td>
  						    <td>{{ $result->i_name  }}</td>
							<!-- <td>		
  								

							</td>  -->
  						    <td><input type="number" readonly class="form-control" id="quantity" name="quantity" value="{{ $result->i_quantity  }}" min="" max=""></td>
							<td><input type="number" class="form-control" name="quantity{{$count}}" value=""></td>
							@if($inventoryCount==0)
							<td>
						<input class="consumerclass" type="hidden" name="consumer">

							<input type="submit" class="btn btn-default" name="submit" value="update">
							</td>
							@endif
  						  </tr>
							@endforeach
							</form>
							</tbody>
						</table>

						<!-- Table End -->
						<div id="user-info">
						
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
<script type="text/javascript" src="/js/instascan.min.js" ></script>	
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
<script>
   const userinfoid=document.getElementById('user-info')
				let scanner = new Instascan.Scanner(
					{
						video: document.getElementById('preview')
					}
				);
				scanner.addListener('scan', function(content) {
					//alert('Matched: ' + content);
				//  modal start
				//  window.open(content, "_blank");

				// ajax stars
				console.log(content)
				$.ajax({
              url: '/distributor/verify',
              type: 'POST',
              data: {value:content},
              success: function (response) {
               // console.log(response.userinfo);
				userinfoid.innerHTML="<form method='POST' action=''>"+
							"<br> Full name: <input class='form-control text-primary' type='text' value='"+response.userinfo.first_name+" "+response.userinfo.last_name+"' readonly>"+
							"<br> Username: <input class='form-control text-primary' type='text' value='"+response.userinfo.username+"' readonly>"+
							"<br> Date: <input type='date' value='' class='form-control text-primary' id='date' name='date' readonly>"+
							"<br> <button class='btn btn-primary' type='submit'>Submit</button>"+
						"</form>";	

						$('.consumerclass').val(response.userinfo.username);	
                
              },
              error: function (err) {
                console.log(err);
              }
            });
				// ajax ends

				});
				Instascan.Camera.getCameras().then(cameras => 
				{
					if(cameras.length > 0){
						scanner.start(cameras[0]);
					} else {
						console.error("no camera found");
					}
				});
  </script>

</html>