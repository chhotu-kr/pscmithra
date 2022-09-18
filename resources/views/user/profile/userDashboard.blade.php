@extends('user/dashboard')
@section('pscmithra')
<div class="seller-dashboard-page">


    <div class="container-fluid">
		<div class="row">
			<div class=" mb-lg-0 mb-3 col-lg-2 order-0">
				 @include('user.profile.sidebar'); 

				
			</div>

			<div class=" mb-lg-0 mb-3 col-lg-10 order-0">
				@livewire('sessionalpdf.pdf')
				

				
			</div>
			
			
			{{-- <div class="col-lg-10 order-lg-last order-1 tab-content">

			{{-- absd,ndn,b --}}
			<div class="col-lg-10 order-lg-last order-1 ">

				<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
				    
					<div class="row gutters">
						
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="fa fa-eye"></i>
								</div>
								<div class="sale-num">
									<h3>9500</h3>
									<p>Open RFQ</p>
								</div>
								<div class="img-sale-box">
								    <img src="img/growth2.png">
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4 info-stats5">
								<div class="info-icon">
									<i class="fa fa-inr"></i>
								</div>
								<div class="sale-num">
									<h3>2500</h3>
									<p>Open Orders</p>
								</div>
								<div class="img-sale-box">
								    <img src="img/money.png">
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="fa fa-signal"></i>
								</div>
								<div class="sale-num">
									<h3>7500</h3>
									<p>Orders Fulfilled</p>
								</div>
								<div class="img-sale-box">
								    <img src="img/request.png">
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4 info-stats5">
								<div class="info-icon">
									<i class="fa fa-cube"></i>
								</div>
								<div class="sale-num">
									<h3>3500</h3>
									<p>Total Txn Value</p>
								</div>
								<div class="img-sale-box">
								    <img src="img/lock.png">
								</div>
							</div>
						</div>
					</div>
					
					<div class="order-table-container text-center">
						<table class="table table-order text-left">
							<thead>
								<tr>
								    <th class="order-status">Sr No.</th>
								    <th class="order-status">Account Type</th>
									<th class="order-id">Amount</th>
									<th class="order-date">Date</th>
									<th class="order-status">Category</th>
									<th class="order-status">Status</th>
								</tr>
								
							</thead>
							<tbody>
								<tr>
								    <td>1</td>
								    <td>Required Type</td>
									<td>₹400.00</td>
									<td>25-06-2022</td>
									<td>Led</td>
									<td>Active</td>
								</tr>
								<tr>
								    <td>2</td>
								    <td>Required Type</td>
									<td>₹400.00</td>
									<td>25-06-2022</td>
									<td>Led</td>
									<td>In Active</td>
								</tr>
								<tr>
								    <td>3</td>
								    <td>Required Type</td>
									<td>₹400.00</td>
									<td>25-06-2022</td>
									<td>Led</td>
									<td>Active</td>
								</tr>
							</tbody>
						</table>
						
					</div>
					
					
					
				</div>
	

				<div class="tab-pane " id="order" role="tabpanel">
					
                      
                      <div class="order-table-container viewButtonshow">
                          <h4 class="title mb-3">Query Management</h4>
							<table class="table table-order text-left">
								<thead>
									<tr>
									    <th class="order-status">RFQ ID</th>
										<th class="order-date">Product Name</th>
										<th class="order-status">Quantity Required</th>
										<th class="order-status">Created AT</th>
										<th class="order-status">View </th>
									</tr>
									
								</thead>
								<tbody>
									<tr>
									    <td>232131</td>
									    <td>1243243</td>
										<td>1000</td>
										<td>09-07-2022</td>
										<td>
										    <div class="btn-two" style="margin-bottom:0;">
                                                <a href="#" class="viewButtonHide"><i class="fa fa-eye"></i></a>
                                            </div>
										</td>
									</tr>
							
								</tbody>
							</table>
							
						</div>
               
                        
                        <div class="order-table-container viewButtonshow1" >
                            <a href="#" class="viewButtonshow2">Back</a>
                            <h4>Product Name</h4>
                        	<table class="table table-order text-left">
                        		<thead>
                        			<tr>
                        			    <th class="order-status">ID</th>
                        				<th class="order-status">Brand</th>
                        				<th class="order-status">Quantity Required </th>
                        				<th class="order-status">Created AT</th>
                        				<th class="order-status">Delivery Date</th>
                        				<th class="order-status">Price</th>
                        				<th class="order-status">View</th>
                        			</tr>
                        			
                        		</thead>
                        		<tbody>
                        			<tr>
                        			    <td>0001</td>
                        				<td>Led</td>
                        			    <td>20</td>
                        				<td>200</td>
                        				<td>22-07-22</td>
                        				<td>200</td>
                        				<td style="width:338px;">
                        				    <button type="button" class="btn btn-warning"><a href="#" data-toggle="modal" data-target="#exampleModalchatebot"><i class="fa fa-eye"></i></a></button>
                        				    <button type="button" class="btn btn-success">Accept</button>
                                            <button type="button" class="btn btn-danger">Deny</button>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalsend">Re-Quote</button>
                        				</td>
                        			
                        			</tr>
                        	
                        		</tbody>
                        	</table>
                        	
                        </div> 
                        
                        
				</div>

				<div class="tab-pane " id="download" role="tabpanel">
					<div class="order-content">
						<h3 class="account-sub-title d-none d-md-block"><i class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
				
                         <div class="tab-main">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Active Order</a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Order History</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="">
                                <div role="tabpanel" class="tab-pane active" id="Section1">
                                   <div class="order-table-container text-center">
            							<table class="table table-order text-left">
            								<thead>
            									<tr>
            									    <th class="order-status">ID</th>
            									    <th class="order-status">Make of Spare</th>
            										<th class="order-id">Brand</th>
            										<th class="order-date">Seller Name</th>
            										<th class="order-status">Order Date</th>
            										<th class="order-status">Price</th>
            										<th class="order-status">Delivery Date</th>
            										<th class="order-status">Delivery Status</th>
            										<th class="order-status">Order Status</th>
            										<th class="order-status">Action</th>
            									</tr>
            									
            								</thead>
            								<tbody>
            									<tr>
            									    <td>001</td>
            									    <td>Spare</td>
            										<td>Led</td>
            										<td>Ajeet</td>
            										<td>22-07-22</td>
            										<td>Rs 200</td>
            										<td>22-07-22</td>
            										<td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="background: #000;
                                    border-color: #000;">View</button></td>
            										<td>Active</td>
            										<td></td>
            									</tr>
            								
            								</tbody>
            							</table>
            							
            						</div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Section2">
                                    <div class="order-table-container text-center">
            							<table class="table table-order text-left">
            								<thead>
            									<tr>
            									    <th class="order-status">ID</th>
            									    <th class="order-status">Make of Spare</th>
            										<th class="order-id">Brand</th>
            										<th class="order-date">Seller Name</th>
            										<th class="order-status">Order Date</th>
            										<th class="order-status">Price</th>
            										<th class="order-status">Delivery Date</th>
            										<th class="order-status">Delivery Status</th>
            										<th class="order-status">Order Status</th>
            										<th class="order-status">Action</th>
            									</tr>
            									
            								</thead>
            								<tbody>
            									<tr>
            									    <td>001</td>
            									    <td>Spare</td>
            										<td>Led</td>
            										<td>Ajeet</td>
            										<td>22-07-22</td>
            										<td>Rs 200</td>
            										<td>22-07-22</td>
            										<td>Delever</td>
            										<td>Complete</td>
            										<td></td>
            									</tr>
            								
            								</tbody>
            							</table>
            							
            						</div>
                                </div>
                                
                            </div>
                        </div>                   
                                
					</div>
				</div>

				<div class="tab-pane fade" id="address" role="tabpanel">
					<div class="address account-content mt-0 pt-2">
						<h4 class="title mb-3">Deliver Management</h4>
                        <table class="table table-order text-left">
								<thead>
									<tr>
									    <th class="order-id">Sr No.</th>
										<th class="order-id">Product Name</th>
										<th class="order-date">Seller Id</th>
										<th class="order-status">Price</th>
										<th class="order-status">Status</th>
									</tr>
									
								</thead>
								<tbody>
									<tr>
									    <td>1</td>
										<td>Led</td>
										<td>Dinesh</td>
										<td>400$</td>
										<td>
										    <div class="btn-two" style="margin: 0;">
                                                <a href="#" data-toggle="modal" data-target="#exampleModal">Status</a>
                                            </div>
										  </td>
									</tr>
								</tbody>
							</table>
					
					</div>
				</div>

				<div class="tab-pane fade" id="edit" role="tabpanel">
					<div class="address account-content mt-0 pt-2">
						<h4 class="title mb-3">Payment</h4>
                        <table class="table table-order text-left">
								<thead>
									<tr>
										<th class="order-id">Product Name</th>
										<th class="order-date">Seller Name</th>
										<th class="order-status">Price</th>
										<th class="order-status">Status</th>
									</tr>
									
								</thead>
								<tbody>
									<tr>
										<td>Led</td>
										<td>Dinesh</td>
										<td>400$</td>
										<td>Active</td>
									</tr>
									<tr>
										<td>Led</td>
										<td>Dinesh</td>
										<td>400$</td>
										<td>Active</td>
									</tr>
									<tr>
										<td>Led</td>
										<td>Dinesh</td>
										<td>400$</td>
										<td>Active</td>
									</tr>
									<tr>
										<td>Led</td>
										<td>Dinesh</td>
										<td>400$</td>
										<td>Active</td>
									</tr>
								</tbody>
							</table>
					
					</div>
				</div>

			<div class="tab-pane fade" id="map-marker" role="tabpanel">
					<div class="address account-content mt-0 pt-2">
					
                        <div class="container-form-box">
                            <h3>Address details</h3>
                              <p>Primary address</p>
                              <div class="row">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="H.no/street no*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="State*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="City*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Landmark*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Pincode*" required>
                                  </div>
                              </div>
                              <p><input type="checkbox"> Primary address same as click on</p>
                              <p>Delivery Address </p>
                              <div class="row">
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Delivery location* " required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Delivery state*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Delivery City*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Delivery Landmark*" required>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="Delivery Pincode*" required>
                                  </div>
                              </div>
                              <div class="btn-main">
                                  <div class="button next" style="width: 200px;">Submit &rarr;</div>
                              </div>
                            
                            
                        </div>
				
					</div>
				</div>
			

			</div>
			</div>

		</div>
	</div>
</div>   
@endsection