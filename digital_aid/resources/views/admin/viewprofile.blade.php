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
    <script type="text/javascript" src="/qrcode.js"></script>
    <script type="text/javascript" src="/js/instascan.min.js" ></script>
</head>
<body>
@include('admin/admindashboard')
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
					<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                    @if($userinfoprofile->username==session('sessionusername'))
                                    <li class="nav-item">
                                        <a class="nav-link" id="updateInfo-tab" data-toggle="tab" href="#updateInfo" role="tab" aria-controls="updateInfo" aria-selected="false">Update Information</a>
                                    </li>
                                    @endif

                                    @if($userinfoprofile->username!=session('sessionusername'))
									<li class="nav-item">
                                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Change Info</a>
                                    </li>
                                    @endif
                                </ul>
                                
                                <div class="tab-content ml-1" id="myTabContent">
                                    
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        
                                        <div class="card-title mb-4">
                                            <div class="d-flex justify-content-start">
                                                <div class="image-container">
                                                    <img src="/img/user/profilepic/{{$userinfoprofile->person_photo}}.jpg" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                    <input class="form-control" name="picturetitle" type="hidden" value="{{$userinfoprofile->username}}" >
                                                </div>
                                                <div class="userData ml-3">
                                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{$userprofile->username}}</a></h2>
                                                    <span class="badge badge-default">{{$userprofile->usertype}}</span>
                                                </div>
                                                <div class="ml-auto">
                                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->first_name}} {{$userinfoprofile->last_name}}
                                            </div>
                                        </div>
										<hr>
										
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->email}}
                                            </div>
                                        </div>
										<hr>
										
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">phone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->phone}}
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">National ID Number</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->nid_no}}
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->gender}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->birthdate}}
                                            </div>
                                        </div>
										<hr>
										

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Join Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->joindate}}
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											{{$userinfoprofile->house}}, {{$userinfoprofile->ward}}-{{$userinfoprofile->union}}, {{$userinfoprofile->upzilla}}, {{$userinfoprofile->zilla}}, {{$userinfoprofile->division}}
                                            </div>
                                        </div>
                                        <hr>

                                 </div>

                                <section class="tab-pane fade" id="updateInfo" role="tabpanel" aria-labelledby="updateInfo-tab">
                                        <!-- update form start  -->
                                        
                                        <div class="card-title mb-4">
                                            <div class="d-flex justify-content-start">
                                                <div class="image-container">
                                                <form method="post" enctype="multipart/form-data" action="/admin/updatepicture">
                
                                                    <img src="/img/user/profilepic/{{$userinfoprofile->person_photo}}.jpg" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                    <input class="form-control" name="picturetitle" type="hidden" value="{{$userinfoprofile->username}}" >
                                                    @if($userinfoprofile->username==session('sessionusername'))
                                                    <div class="userData ml-2">
                                                        <input type="file" name="file" class="btn btn-info btn-sm" class="form-control-file">
                                                        <input type="submit"  value="submit" class="btn btn-success">
                                                    </div>
                                                    @endif	
                                                </form>
                                                </div>
                                                <div class="ml-auto">
                                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                </div>
                                            </div>
                                        </div>

										<form method="POST"  enctype="multipart/form-data" >
                                    </form>
                                </section>
                                    <!-- update form end -->
                                    
                                    <!-- History start -->
                                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                        <form method="POST" action="/admin/userupdate">
                                            <input type="hidden" name="username" value="{{$userprofile->username}}">
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">User Type</label>
											</div>
											<div class="col-md-8 col-6">
                                            <select name="usertype" class="browser-default custom-select">
											@if($userprofile->usertype=="admin")																
												
											<option selected value="admin">admin</option>
 											 <option  value="distributor">distributor</option>
 											 <option  value="consumer">consumer</option>
											@elseif($userprofile->usertype=="distributor")															
												
											<option value="admin">admin</option>
 											 <option selected value="distributor">distributor</option>
 											 <option  value="consumer">consumer</option>
											@elseif($userprofile->usertype=="consumer")															
												
											<option value="admin">admin</option>
 											 <option value="distributor">distributor</option>
 											 <option selected value="consumer">consumer</option>
											@endif
											</select>
											</div>
                                        </div>
                                        <hr>
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Action</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="submit" class="btn btn-info" name="submit" value="update">
                                            <input type="submit" class="btn btn-danger" name="submit" value="delete">
                                            @if($userprofile->status=="invalid")
                                            <a class="btn btn-success" href="/admin/validnow/{{$userprofile->username}}"> Valid Now</a>
                                            @elseif($userprofile->usertype=="consumer" && $userprofile->status=="valid")
                                            <a class="btn btn-success" href="/admin/validnow/{{$userprofile->username}}"> Renew Card</a>	
                                            @endif
                                            </div>
                                        </div>
										<hr>
                                    </form>
                                    </div>


									<!-- History end -->
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
	</div>
	<!-- End -->
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