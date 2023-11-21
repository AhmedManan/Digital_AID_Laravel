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
@include('distributor/distributordashboard')
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid cta-inner text-center rounded">
                        <div class="w3-bar w3-black ">
                            <button class="btn-info btn-lg active" onclick="openTab('view')">Basic Info</button>
                            @if($userinfoprofile->username==session('sessionusername'))
                            <button class="btn-success btn-lg active" onclick="openTab('edit')">Update Information</button>
                            @endif
                          </div>
                          
                          <div id="view" class="w3-container city">
                            @include('distributor/viewprofile/viewprofile')
                          </div>
                          
                          <div id="edit" class="w3-container city" style="display:none">
                            @include('distributor/viewprofile/editprofile')
                          </div>
                          
                          <script>
                          function openTab(cityName) {
                            var i;
                            var x = document.getElementsByClassName("city");
                            for (i = 0; i < x.length; i++) {
                              x[i].style.display = "none";  
                            }
                            document.getElementById(cityName).style.display = "block";  
                          }
                          </script>
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