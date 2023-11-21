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