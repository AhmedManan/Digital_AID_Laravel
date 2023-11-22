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
						<h4 class="page-title">All Users</h4>
						<!-- Tab -->

						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
						    <a class="nav-link active" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="true"><p class="text-muted">ADMIN LIST</p></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="distributor-tab" data-toggle="tab" href="#distributor" role="tab" aria-controls="distributor" aria-selected="false"><p class="text-primary">DISTRIBUTOR LIST</p></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="consumer-tab" data-toggle="tab" href="#consumer" role="tab" aria-controls="consumer" aria-selected="false"><p class="text-success">CONSUMER LIST</p></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="invalid-tab" data-toggle="tab" href="#invalid" role="tab" aria-controls="invalid" aria-selected="false"><p class="text-danger">INVALID USERS</p></a>
						  </li>
						</ul>
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
						  
						  						<!-- Admin Table -->
						<div style="width: 400px;" class="searchdiv">
					    <form method="post" action="/admin/searchadmin">

							<input   type="text" class="form-control" name="searchusername">	
							<input type="hidden"  name="usertype" value="admin">	
											
							<input  type="submit"  class="btn btn-primary" name="submit">						
						</form>
						</div>
						<div style="height: 300px;" class="table-responsive my-table table-hover">
							<table  class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>ADMIN ID</th>
										<th>USERNAME</th>
										<th>EMAIL</th>
										<th>Action</th>
										<th>Inbox</th>
									</tr>
								</thead>
								<tbody>
								@foreach($users as $result)
								<!-- if else condition to check all the admins -->
								@if($result->usertype=="admin")
									<tr>
										<th scope="row"></th>
										<td>{{ $result->id  }}</td>
										<td>{{ $result->username  }}</td>
										<td>{{ $result->email  }}</td>
										<td>
											<a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a>
											@if($result->status=="invalid")
											<a class="btn btn-danger" href="/admin/validnow/{{$result->username}}">
											valid now
										</a>
										@endif
										</td>
									    <td>

											<a class="btn btn-success" href="/admin/inbox/{{$result->username}}">
												Inbox
											</a>

										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- Admin table end -->
						  
						  </div>
						  <div class="tab-pane fade" id="distributor" role="tabpanel" aria-labelledby="distributor-tab">
						  
						  						<!-- Distributor table Start  -->
						<div style="width: 400px;" class="searchdiv">
							<form method="post" action="/admin/searchadmin">
	
								<input type="text" class="form-control" name="searchusername">	
								<input type="hidden"  name="usertype" value="admin">	
												
								<input type="submit"  class="btn btn-primary" name="submit">						
							</form>
							</div>
						<div style="height: 300px;" class="table-responsive my-table table-hover">
							<table  class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>DISTRIBUTOR ID</th>
										<th>USERNAME</th>
										<th>EMAIL</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $result)
								
								<!-- if else condition to check all the admins -->
      						      @if($result->usertype=="distributor")
       						    
      					        
									<tr>
										<th scope="row"></th>
										<td class="text-primary">{{ $result->id  }}</td>
										<td class="text-primary">{{ $result->username  }}</td>
										<td class="text-primary">{{ $result->email  }}</td>
										<td>
											<a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a>
											@if($result->status=="invalid")
											<a class="btn btn-danger" href="/admin/validnow/{{$result->username}}">
											valid now
										</a>
										@endif
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
							<!-- distributor table end -->
						  
						  </div>
						  <div class="tab-pane fade" id="consumer" role="tabpanel" aria-labelledby="consumer-tab">
						  
						  							<!-- consumer table start -->
							<div style="width: 400px;" class="searchdiv">
								<form method="post" action="/admin/searchadmin">
		
									<input type="text" class="form-control" name="searchusername">	
									<input type="hidden"  name="usertype" value="admin">	
													
									<input type="submit"  class="btn btn-primary" name="submit">						
								</form>
								</div>
							<div style="height: 300px;" class="table-responsive my-table table-hover">
								<table  class="table table-bordered text-muted">
									<thead>
										<tr>
											<th>#</th>
											<th>CONSUMER ID</th>
											<th>USERNAME</th>
											<th>EMAIL</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($users as $result)
									<!-- if else condition to check all the admins -->
      						      @if($result->usertype=="consumer")

										<tr>
											<th scope="row"></th>
											<td class="text-success">{{ $result->id  }}</td>
											<td class="text-success">{{ $result->username  }}</td>
											<td class="text-success">{{ $result->email  }}</td>
											<td>
											<a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a>
											@if($result->status=="invalid")
											<a class="btn btn-danger" href="/admin/validnow/{{$result->username}}">
											valid now
										</a>
										@endif
										</td>
										</tr>
										@endif
									@endforeach
									</tbody>
								</table>
							</div>
							<!-- consumer table end -->

						  </div>

						  <div class="tab-pane fade" id="invalid" role="tabpanel" aria-labelledby="invalid-tab">
							  					<!-- invalid user table start -->
							<div style="width: 400px;" class="searchdiv">
								<form method="post" action="/admin/searchadmin">
		
									<input type="text" class="form-control" name="searchusername">	
									<input type="hidden"  name="usertype" value="admin">	
													
									<input type="submit"  class="btn btn-primary" name="submit">						
								</form>
								</div>
							<div style="height: 300px;" class="table-responsive my-table table-hover">
								<table  class="table table-bordered text-muted">
									<thead>
										<tr>
											<th>#</th>
											<th>USER ID</th>
											<th>USERNAME</th>
											<th>EMAIL</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($users as $result)
									<!-- if else condition to check all the admins -->
      						      @if($result->status=="invalid")

										<tr>
											<th scope="row"></th>
											<td class="text-danger">{{ $result->id  }}</td>
											<td class="text-danger">{{ $result->username  }}</td>
											<td class="text-danger">{{ $result->email  }}</td>
											<td>
											<a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a>
											@if($result->status=="invalid")
											<a class="btn btn-danger" href="/admin/validnow/{{$result->username}}">
											valid now
										</a>
										@endif
										</td>
										</tr>
										@endif
									@endforeach
									</tbody>
								</table>
							</div>
							<!-- invalid user table end -->

						</div>

						</div>

						<!-- Tab End -->

						</div>
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