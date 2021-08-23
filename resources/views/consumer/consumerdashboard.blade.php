	  <!-- Custom styles for this template -->
	  <link href="/css/business-casual.css" rel="stylesheet">

<script>
var mymsg="ss";
function myTimer() {
	$.ajax({
		url:'/consumer/allmsg',
		success: function(response){
			
			mymsg=response.allmsg;			
			
			//  console.log(mymsg.description)
			if(response.msgcount>0){
			myFunction(mymsg);
			}
			
		},
		error: function(err){
			console.log(err)
		}
	});
}

// var mod=$("#notice").modal();

// 	if(mod.is('visible')){

// 	}
// 	else{
// 	}

// function background() {
// 		setInterval(myTimer, 10000)

// }

// 	function myFunction(msg) {
// 		var allmsgcount='';
// 		// console.log(msg);
// 		setTimeout(mymodal(msg), 2000);
	
//          function mymodal(msg){
			 
// 			$("#notice").modal();
// 			$('.modal-body').text(msg.description)
// 			$.ajax({
//     			url:"/consumer/announcementseen/"+msg.id+"",
    			
//     			success: function(response){
					
// 					$('.notification').text(response.msgcount);
// 					allmsgcount=response.msgcount;
					
//     			},
//     			error: function(err){
//     			    console.log(err)
//     			}
// 				});
// 		 }
		 
		 
// 	}


</script>
<div class="wrapper">
		<div class="main-header" id="mainNav">
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
								<i class="la la-bell"></i>
								<span class="notification">{{$allmessagescount}}</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have {{$allmessagescount}} Pending Announcements</div>
								</li>
								<li>
									<div class="notif-center">
										@foreach($allmessages as $msg)
										<a href="/consumer/announcementseen/{{$msg->id}}">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{$msg->description}}
												</span>
											</div>
										</a>
												@endforeach
									
									</div>
								</li>
							
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="/img/user/profilepic/{{$user->person_photo}}.jpg" alt="user-img" width="36" class="img-circle"><span > {{$user->first_name}} </span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="/img/user/profilepic/{{$user->person_photo}}.jpg" alt="{{$user->first_name}}"></div>
										<div class="u-text">
											<h4>{{$user->username}}</h4>
											<p class="text-muted">{{$user->first_name}} {{$user->last_name}}</p><a href="/consumer/viewprofile/{{$user->username}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
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
									<span class="user-level">Consumer</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" >
								<ul class="nav">
									<li>
										<a href="/consumer/viewprofile/{{$user->username}}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="/consumer/viewprofile/{{$user->username}}">
											<span class="link-collapse">Edit Profile</span>
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
							<a href="/consumer">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<!-- <span class="badge badge-count">2</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="/consumer/history">
								<i class="la la-th"></i>
								<p>history</p>
								<!-- <span class="badge badge-danger">2</span> -->
							</a>
						</li>
						<li class="nav-item">
							<a href="/consumer/reports">
								<i class="la la-comment"></i>
								<p>Reports</p>
								<!-- <span class="badge badge-danger">5</span> -->
							</a>
						</li>
					</ul>
				</div>
			</div>

			@include('consumer/modal');
