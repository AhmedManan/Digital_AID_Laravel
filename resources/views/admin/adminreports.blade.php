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
						<h4 class="page-title">Reports</h4>

<table class="table table-borderless">
<form action="/admin/reports" method="post">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Details</th>
      <th scope="col">Reply</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($report as $result)
  @if($result->status=="unsolved")
    <tr>
      <th scope="row">{{ $result->id  }}</th>
      <td>{{$result->sender_email}}</td>
      <td>
             <div style="padding-bottom: 18px;">Date: {{$result->date}}<br/> </div>
            <div style="padding-bottom: 18px;">Subject: <span style="color: red;"> {{$result->subject }}</span><br/> </div>
                        <div style="padding-bottom: 18px;">Description<br/>
                        <textarea id="data_7" false name="data_7" style="max-width : 450px;" rows="6" class="form-control" readonly>{{$result->description}}</textarea>
            </div>
      </td>
      <td>
          <textarea id="data_7" name="reply" style="max-width : 450px;" rows="6" class="form-control"></textarea>
      </td>
      <input type="hidden" name="id" value="{{$result->id}}">
      <td><div style="padding-bottom: 18px;"><input name="Submit" value="Solve" type="submit"/></div></td>
    </tr>
    @else
    <tr>
      <th scope="row">{{$result->id}}</th>
      <td>{{$result->sender_email}}</td>
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
    @endif
    @endforeach
  </tbody>
  </form>
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