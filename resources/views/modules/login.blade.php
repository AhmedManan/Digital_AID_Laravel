            <!-- login form  -->
            <form method="POST" action="/login">
         
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="username" name="username" value= "">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                        <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                      </div>
                  </div>
                  <div class="col">
                    <input type="password" class="form-control" placeholder="password" name="password" value= "">
                  </div>
                  <div class="col">
                  <button type="submit" class="btn btn-primary my-1" value="POST">login</button>
                  </div>
                </div>
              </form>
            <!-- login form end -->