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
						<h4 class="page-title">Dashboard</h4>

						<!-- Admin Table -->
						<p class="text-muted">ADMIN LIST</p>
						<div style="width: 400px;" class="searchdiv">
					    <form method="post" action="/admin/searchadmin">

							<input type="text" class="form-control" name="searchusername">						
							<input type="submit"  class="btn btn-primary" name="submit">						
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
									</tr>
								</thead>
								<tbody>
								<!-- if else condition to check all the admins -->
								@if($result->usertype=="admin")
									<tr>
										<th scope="row"></th>
										<td>{{ $result->id  }}</td>
										<td>{{ $result->username  }}</td>
										<td>{{ $result->email  }}</td>
										<td><a class="btn btn-default" href="/admin/viewprofile/{{$result->username}}">View Information</a></td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
						<!-- Admin table end -->





						<!-- Distributor table Start  -->
						<p class="text-primary">DISTRIBUTOR LIST</p>
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
				
      						      @if($result->usertype=="distributor")
       						    
      					        
									<tr>
										<th scope="row"></th>
										<td class="text-primary">{{ $result->id  }}</td>
										<td class="text-primary">{{ $result->username  }}</td>
										<td class="text-primary">{{ $result->email  }}</td>
										<td><a class="btn btn-primary" href="/admin/viewprofile/{{$result->username}}">View Information</a></td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
							<!-- distributor table end -->





							<!-- consumer table start -->
							<p class="text-danger">CONSUMER LIST</p>
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
      						      @if($result->usertype=="consumer")

										<tr>
											<th scope="row"></th>
											<td class="text-danger">{{ $result->id  }}</td>
											<td class="text-danger">{{ $result->username  }}</td>
											<td class="text-danger">{{ $result->email  }}</td>
											<td><a class="btn btn-danger" href="/admin/viewprofile/{{$result->username}}">View Information</a></td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
							<!-- consumer table end -->
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