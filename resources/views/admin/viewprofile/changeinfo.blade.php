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

										                      <form method="POST"  enctype="multipart/form-data" >
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
                                                <input type="submit" name="submit" class="btn btn-info" value="update">
                                                <input type="submit" class="btn btn-danger" name="submit" value="delete">
                                                </div>
                                            </div>
                                    </form>