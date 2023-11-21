						  <!-- Inventory Option -->
                        <br>
						<form action="/admin/inventoryexcel" method="post">
                        <p>Click on the <input type="submit" class="btn btn-secondary" name="submit" value="Excel">
                         button to download inventory item details in excel sheet.
                        </p>
						</form>
                        <br>

						<!-- Inventory table -->
                        <div style="height: 500px;" class="table-responsive my-table table-hover">
						<table class="table table-hover">
  						<thead>
    						<tr>
     						 <th scope="col">Item ID</th>
     						 <th scope="col">Item Name</th>
							 <th scope="col">Assign Distributor</th>
     						 <th scope="col">Current Quantity (kg/litre)</th>
							 <th scope="col">Operation</th>
							 <th scope="col">Assign (kg/litre)</th>
							 <th scope="col">Action</th>
   						 </tr>
 						 </thead>
 						 <tbody>
						  @foreach($inventory as $result)
						  <form method="POST" action="/admin/inventory" >
						  <input type="hidden" name="id" value="{{$result->id}}">
						  <input type="hidden" name="name" value="{{$result->name}}">
  						  <tr>
  						    <td>{{ $result->id  }}</td>
  						    <td>{{ $result->name  }}</td>
							<td>
							
  								<select class="form-control" name="distributor" id="exampleFormControlSelect1">
									<option value="">Select Distributor</option>
								  @foreach($distributor as $dist)
									<option value="{{$dist->username}}">{{$dist->username}}</option>
									@endforeach
									    </select>
							</td> 
  						    <td><input type="number" readonly class="form-control" id="quantity" name="quantity" value="{{ $result->quantity  }}" min="" max=""></td>
							<td>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="optionsRadios" value="+">
												<span class="form-radio-sign">+</span>
											</label>
											<label class="form-radio-label">
												<input class="form-radio-input" type="radio" name="optionsRadios" value="-">
												<span class="form-radio-sign">-</span>
											</label>
							</td>
							<td><input type="number" class="form-control" name="quantity" value=""></td>
							<td><input type="submit" class="btn btn-default" name="submit" value="update"></td>
							<td><input type="submit" class="btn btn-default" name="submit" value="delete"></td>
  						  </tr>
							</form>
							@endforeach
							</tbody>
							<tfoot>
							<tr>
     						 <th scope="col">Add a new item</th>
							  </tr>
							<tr>
     						 <th scope="col">#</th>
     						 <th scope="col">ID</th>
							  <form method="POST" action="/admin/inventory" >
     						 <th scope="col"><input type="text" class="form-control" id="name" name="name" placeholder="item name" value=""></th>
     						 <th scope="col"><input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity" value="" min="" max=""></th>
							 <th scope="col"><input type="submit" class="btn btn-default" name="submit" value="add"></th>
							 </form>
   						 </tr>
						<tfoot>
						</table>
                        </div>
						
						<!-- Inventory table end -->