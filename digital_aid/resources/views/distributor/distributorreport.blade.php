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
			<div class="main-panel ">
			<form method="post" style="padding-left: 20%; padding-top: 10%;">
                        <div style="max-width: 400px;">
                        </div>
                        <div style="padding-bottom: 18px;font-size : 28px;">Report An Issue</div>
                      
                        <div style="padding-bottom: 18px;">Subject<span style="color: red;"> *</span><br/>
                        <input type="text" id="data_6" name="subject" style="max-width : 450px;" class="form-control"/>
                        </div>
                        <div style="padding-bottom: 18px;">Description<br/>
                        <textarea id="data_7" false name="description" style="max-width : 450px;" rows="6" class="form-control"></textarea>
                        </div>
                        <div style="padding-bottom: 18px;"><input name="Submit" class="btn btn-primary" value="Submit" type="submit"/></div>
                    
                        </form>
			
			<table class="table table-borderless">
			
  <thead>
    <tr>
      <!-- <th scope="col">ID</th> -->
      <!-- <th scope="col">Username</th> -->
      <th scope="col">Details</th>
      <th scope="col">Reply</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($report as $result)
    <tr>
      <!-- <th scope="row">{{$result->id}}</th> -->
      <!-- <td>{{$result->sender}}</td> -->
      <td>
             <div style="padding-bottom: 18px;">Date: {{$result->date}}<br/> </div>
            <div style="padding-bottom: 18px;">Subject: <span style="color: red;">{{$result->subject }}</span><br/> </div>
                        <div style="padding-bottom: 18px;">Description<br/>
                        <textarea id="data_7" false name="data_7" style="max-width : 450px;" rows="6" class="form-control" readonly>{{$result->description}}</textarea>
            </div>
      </td>
      <td>
                        <textarea id="data_7" false name="data_7" style="max-width : 450px;" rows="6" class="form-control" readonly>{{$result->reply}}</textarea>
      </td>
      <td><div style="padding-bottom: 18px;">Solved by: <span style="color: green;">{{$result->actioned_by}}</span><br/> </div></td>
    </tr>
    @endforeach
  </tbody>
</table>
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