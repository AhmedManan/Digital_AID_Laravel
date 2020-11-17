	  <!-- Custom styles for this template -->
	  <link href="/css/user/custom.css" rel="stylesheet">
<?php
$myFile = "cnf/".$user->username.".txt";
$lines = file($myFile);//file in to an array
if(count($lines)>0){

	$str = str_replace(array("\r","\n"), "", $lines[1]);
}
else{
	$str="mainNav";
}
//echo $lines[1];
// $myfile = fopen($myFile, "w");
// $lines[1] = "0Mickey Mouse\n";
// $str=implode("",$lines);
// fwrite($myfile, $str);
// fclose($myfile);
// echo $str;
?>

<div class="wrapper">
		<div class="main-header" id="{{$str}}">
			<div class="logo-header">
				<a href="" class="logo">
					Digital AID
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg" id="mainNav">
				<div class="container-fluid">
					
					<!-- <form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
								<span class="notification">{{$pmessagescount}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{$pmessagescount}} Messages</div>
								</li>
								<li>
									<div class="notif-center">
										@foreach($pmessages as $msg)
										<a href="/admin/inbox/{{$msg->sender}}">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
												 sent from {{$msg->sender}}:	{{$msg->text}}
												</span>
											</div>
										</a>
												@endforeach
									
									</div>
								</li>
								<!-- <li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li> -->
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								@if($dashboard > 0)
								<span class="notification">{{$dashboard}}</span>
								@endif
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{$dashboard}} Pending Task</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="/admin/users">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{$invaliduser}} New user Added.
													Verify Now!
												</span>
											</div>
										</a>
										<a href="/admin/reports">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{$totalreport}} New report need to be check
												</span>
											</div>
										</a>
									</div>
								</li>
								<!-- <li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li> -->
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img class="u-img" src="/img/user/profilepic/{{$user->person_photo}}.jpg" alt="user-img" width="36" class="img-circle"><span >{{$user->username}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="/img/user/profilepic/{{$user->person_photo}}.jpg" alt="user"></div>
										<div class="u-text">
											<h4>{{$user->username}}</h4>
											<p class="text-muted">{{$user->first_name}} {{$user->last_name}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<!-- <div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a> -->
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/logout"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar" id="mainNav">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="/img/user/profilepic/{{$user->person_photo}}.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
								{{$user->first_name}} {{$user->last_name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/viewprofile/{{$user->username}}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="/admin/viewprofile/{{$user->username}}">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="/admin/theme">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
									<li>
										<a href="/logout">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="/admin">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								@if($dashboard > 0)
								<span class="badge badge-count">{{$dashboard}}</span>
								@endif
							</a>
						</li>
						<li class="nav-item">
							<a href="/admin/users">
								<i class="la la-users"></i>
								<p>All Users</p>
								@if($invaliduser > 0)
								<span class="badge badge-danger">{{$invaliduser}}</span>
								@endif
							</a>
						</li>
						<li class="nav-item">
							<a class="" data-toggle="collapse" href="#users" aria-expanded="true">
									<i class="la la-users"></i>
									<p>All users</p>
									<!-- <span class="badge badge-count">50</span> -->
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="users" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="/admin/adminslist">
											<span class="link-collapse">Admins</span>
										</a>
									</li>
									<li>
										<a href="/admin/distributorslist">
											<span class="link-collapse text-primary">Distributors</span>
										</a>
									</li>
									<li>
										<a href="/admin/consumerslist">
											<span class="link-collapse text-success">Consumers</span>
										</a>
									</li>
									<li>
										<a href="/admin/unverifiedusers">
											<span class="link-collapse text-danger">Unverified users</span>
											@if($invaliduser > 0)
											<span class="badge badge-danger">{{$invaliduser}}</span>
											@endif
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- <li class="nav-item">
							<a href="forms.html">
								<i class="la la-keyboard-o"></i>
								<p>Forms</p>
								<span class="badge badge-count">50</span>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="/admin/inventory">
								<i class="la la-th"></i>
								<p>Inventory</p>
								@if($itemstatus > 0)
								<span class="badge badge-danger">{{$itemstatus}}</span>
								@endif
							</a>
						</li>
						<li class="nav-item">
							<a href="notifications.html">
								<i class="la la-bell"></i>
								<p>Notifications</p>
								<span class="badge badge-success">3</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="/admin/announcement">
								<i class="la la-font"></i>
								<p>Announcement</p>
								<!-- <span class="badge badge-danger">25</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="/admin/reports">
								<i class="la la-comment"></i>
								<p>Reports</p>
								@if($totalreport > 0)
								<span class="badge badge-danger">{{$totalreport}}</span>
								@endif
							</a>
						</li>
						<!-- <li class="nav-item">
							<a href="icons.html">
								<i class="la la-fonticons"></i>
								<p>Icons</p>
							</a>
						</li> -->
						<!-- <li class="nav-item update-pro">
							<button  data-toggle="modal" data-target="#modalUpdate">
								<i class="la la-hand-pointer-o"></i>
								<p>Update To Pro</p>
							</button>
						</li> -->
					</ul>
				</div>
			</div>