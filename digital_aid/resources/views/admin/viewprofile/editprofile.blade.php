
                                        <!-- update form start  -->
                                        
                                        <div class="card-title mb-4">
                                            <div class="d-flex justify-content-start">
                                                <div class="image-container">
                                                <form method="post" enctype="multipart/form-data" action="/admin/updatepicture">
                
                                                    <img src="/img/user/profilepic/{{$userinfoprofile->person_photo}}.jpg" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                                    <input class="form-control" name="picturetitle" type="hidden" value="{{$userinfoprofile->username}}" >
                                                    <input type="file" name="file" class="btn btn-info btn-sm" class="form-control-file">
                                                    <input type="submit"  value="submit" class="btn btn-success">
                                                    @if($userinfoprofile->username==session('sessionusername'))
                                                    <div class="userData ml-2">
                                                        <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#changepropic">Change Profile Picture</button> -->
                                                        <!-- <input type="file" name="file" class="btn btn-info btn-sm" class="form-control-file"> -->
                                                        <!-- <input type="submit"  value="submit" class="btn btn-success"> -->
                                                    </div>
                                                    @endif	
                                                </form>
                                                </div>
                                                <!-- <div class="userData ml-3">
                                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{$userprofile->username}}</a></h2>
                                                    <span class="badge badge-default">{{$userprofile->usertype}}</span>
                                                </div> -->
                                                <div class="ml-auto">
                                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                                </div>
                                            </div>
                                        </div>

										<form method="POST"  enctype="multipart/form-data" >
									<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											
											<div class="row">
    											<div class="col">
      											<input type="text" class="form-control" placeholder="First name" value="{{$userinfoprofile->first_name}}" name="firstname">
   											 </div>
  											  <div class="col">
   											   <input type="text" class="form-control" placeholder="Last name" value="{{$userinfoprofile->last_name}}" name="lastname">
   											 </div>
 											 </div>
                                            </div>
                                        </div>
										<hr>
										
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input type="text" class="form-control" placeholder="email" value="{{$userinfoprofile->email}}" name="email">
                                            </div>
                                        </div>
										<hr>

										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Username</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input class="form-control" type="text" value="{{$userinfoprofile->username}}" id="" readonly>
                                            </div>
                                        </div>
                                        <hr>
										
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">phone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input type="text" class="form-control" placeholder="phone no" value="{{$userinfoprofile->phone}}" name="phone">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Password</label>
                                            </div>
                                          
                                            <div class="col-md-8 col-6">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#changepassword">Change Password</button>
                                                @include('admin/viewprofile/changepass-modal')
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">National ID Number</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input type="text" class="form-control" placeholder="National ID Number" value="{{$userinfoprofile->nid_no}}" name="nid_no">
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
											</div>
											<div class="col-md-8 col-6">
                                            <select name="gender" class="browser-default custom-select">	

											@if($userinfoprofile->gender=="male")																
												
											<option selected value="male">male</option>
 											 <option  value="female">female</option>
 											 <option  value="others">others</option>
											@elseif($userinfoprofile->gender=="female")																
												
											<option  value="male">male</option>
 											 <option selected  value="female">female</option>
 											 <option  value="others">others</option>
											@else															
												
											<option  value="male">male</option>
 											 <option  value="female">female</option>
 											 <option selected value="others">others</option>
											@endif
											
											</select>
											</div>
                                        </div>
										<hr>

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input class="form-control" type="date" value="{{$userinfoprofile->birthdate}}" id="example-date-input">
                                            </div>
                                        </div>
                                        <hr>
									
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Join Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<input type="text" class="form-control" readonly value="{{$userinfoprofile->joindate}}" name="joindate">
                                            </div>
                                        </div>
										<hr>

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
                                                <label style="font-weight:bold;">Nid Photo</label>
                                            </div>
                                            <div class="col-md-8 col-6">
									<img src="/img/user/nidpic/{{$userinfoprofile->nid_photo}}.jpg" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
											
									<input class="form-control" name="nidtitle" type="hidden" value="{{$userinfoprofile->nid_no}}" >

								<input type="file" class="btn btn-info btn-sm" name="file" class="form-control-file">

                                            </div>
                                        </div>
                                        <hr>

										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Action</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                @if($userinfoprofile->username==session('sessionusername'))
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#currentpassword">Update</button>
                                                <!-- <input type="submit" name="submit" value="update"> -->
                                                @endif
                                                <!-- <input type="submit" class="btn btn-danger" name="submit" value="delete"> -->
                                                @include('admin/viewprofile/currentpass-modal')
                                            </div>
                                        </div>
                                    </form>
