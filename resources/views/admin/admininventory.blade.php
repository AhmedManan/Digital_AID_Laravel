<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>DIGITAL AID: ADMIN</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/css/user/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/css/user/ready.css">
	<link rel="stylesheet" href="/css/user/demo.css">
</head>
<body>
@include('admin/admindashboard')
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">

					<nav>
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <a class="nav-item nav-link active" id="nav-inventory-tab" data-toggle="tab" href="#nav-inventory" role="tab" aria-controls="nav-inventory" aria-selected="true"><h4 class="page-title">Inventory</h4></a>
					    <a class="nav-item nav-link" id="nav-distributor-tab" data-toggle="tab" href="#nav-distributor" role="tab" aria-controls="nav-distributor" aria-selected="false"><h4 class="page-title">Distributor Goods</h4></a>
					    <a class="nav-item nav-link" id="nav-overall-tab" data-toggle="tab" href="#nav-overall" role="tab" aria-controls="nav-overall" aria-selected="false"><h4 class="page-title">Inventory Details</h4></a>
					  </div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
					  <div class="tab-pane fade show active" id="nav-inventory" role="tabpanel" aria-labelledby="nav-inventory-tab">
						  <!-- Inventory Option -->
						  <form action="/admin/inventoryexcel" method="post">
						<input type="submit" class="btn btn-secondary" name="submit" value="Excel">
						</form>

						<!-- Inventory table -->
						<table class="table table-hover">
  						<thead>
    						<tr>
     						 <th scope="col">#</th>
     						 <th scope="col">ID</th>
     						 <th scope="col">Item</th>
							 <th scope="col">Assign Distributor</th>
     						 <th scope="col">Quantity (kg/litre)</th>
							 <th scope="col">Operation</th>
							 <th scope="col">Assign (kg/litre)</th>
							 <th scope="col">Action</th>
   						 </tr>
 						 </thead>
 						 <tbody>
						  @foreach($inventory as $result)
						  <form method="POST" action="/admin/inventory" >
						  <input type="hidden" name="id" value="{{$result->id}}">
						  <input type="hidden" name="name" value="{{$result->name}}">
  						  <tr>
  						    <th scope="row"></th>
  						    <td>{{ $result->id  }}</td>
  						    <td>{{ $result->name  }}</td>
							<td>
							
  								<select class="form-control" name="distributor" id="exampleFormControlSelect1">
									<option value="">Select Distributor</option>
								  @foreach($distributor as $dist)
									<option value="{{$dist->username}}">{{$dist->username}}</option>
									@endforeach
									    </select>
  								</div>
								</div>
							</td> 
  						    <td><input type="number" readonly class="form-control" id="quantity" name="quantity" value="{{ $result->quantity  }}" min="" max=""></td>
							<td>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="optionsRadios" value="+">
												<span class="form-radio-sign">+</span>
											</label>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="optionsRadios" value="-">
												<span class="form-radio-sign">-</span>
											</label>
							</td>
							<td><input type="number" class="form-control" name="quantity" value=""></td>
							<td><input type="submit" class="btn btn-default" name="submit" value="update"></td>
							<td><input type="submit" class="btn btn-default" name="submit" value="delete"></td>
  						  </tr>
							</form>
							@endforeach
							</tbody>
							<tfoot>
							<tr>
     						 <th scope="col">Add a new item</th>
							  </tr>
							<tr>
     						 <th scope="col">#</th>
     						 <th scope="col">ID</th>
							  <form method="POST" action="/admin/inventory" >
     						 <th scope="col"><input type="text" class="form-control" id="name" name="name" placeholder="item name" value=""></th>
     						 <th scope="col"><input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="" min="" max=""></th>
							 <th scope="col"><input type="submit" class="btn btn-default" name="submit" value="add"></th>
							 </form>
   						 </tr>
						<tfoot>
						</table>
						
						<!-- Inventory table end -->
					  </div>
					  <div class="tab-pane fade" id="nav-distributor" role="tabpanel" aria-labelledby="nav-distributor-tab">
						  <!-- Distrinutor List -->
						  @include('admin/inventory-distributorgoods')
					  </div>
					  <div class="tab-pane fade" id="nav-overall" role="tabpanel" aria-labelledby="nav-overall-tab">
					  @include('admin/inventory-details')
					  </div>
					</div>					

					<!-- --------------------------------------------------------------- -->

					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
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