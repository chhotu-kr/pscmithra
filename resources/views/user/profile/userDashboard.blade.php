@extends('user/dashboard')
@section('pscmithra')
   

   <div class="seller-dashboard-page">
    



    <div class="container-fluid">
		<div class="row">
			<div class=" mb-lg-0 mb-3 col-lg-2 order-0">
			@include('user.profile.sidebar');

			    
			</div>
			<div class="col-lg-10 order-lg-last order-1 tab-content">
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
	

				<div class="tab-pane fade" id="order" role="tabpanel">
					
                      
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
               
                        
                        <div class="order-table-container viewButtonshow1" style="display:none;">
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

				<div class="tab-pane fade" id="download" role="tabpanel">
					<div class="order-content">
						<h3 class="account-sub-title d-none d-md-block"><i class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
				
                         <div class="tab-main">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Active Order</a></li>
                                <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Order History</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
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
			
			</div><!-- End .tab-content -->
		</div>
	</div>
</div>

{{-- <section class="section profile">
	<div class="row">
	  <div class="col-xl-4">

		<div class="card">
		  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

			<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
			<h2>Kevin Anderson</h2>
			<h3>Web Designer</h3>
			<div class="social-links mt-2">
			  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
			  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
			  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
			  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
			</div>
		  </div>
		</div>

	  </div>

	  <div class="col-xl-8">

		<div class="card">
		  <div class="card-body pt-3">
			<!-- Bordered Tabs -->
			<ul class="nav nav-tabs nav-tabs-bordered">

			  <li class="nav-item">
				<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
			  </li>

			  <li class="nav-item">
				<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
			  </li>

			  <li class="nav-item">
				<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
			  </li>

			  <li class="nav-item">
				<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
			  </li>

			</ul>
			<div class="tab-content pt-2">

			  <div class="tab-pane fade show active profile-overview" id="profile-overview">
				<h5 class="card-title">About</h5>
				<p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

				<h5 class="card-title">Profile Details</h5>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label ">Full Name</div>
				  <div class="col-lg-9 col-md-8">Kevin Anderson</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Company</div>
				  <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Job</div>
				  <div class="col-lg-9 col-md-8">Web Designer</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Country</div>
				  <div class="col-lg-9 col-md-8">USA</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Address</div>
				  <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Phone</div>
				  <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
				</div>

				<div class="row">
				  <div class="col-lg-3 col-md-4 label">Email</div>
				  <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
				</div>

			  </div>

			  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

				<!-- Profile Edit Form -->
				<form>
				  <div class="row mb-3">
					<label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
					<div class="col-md-8 col-lg-9">
					  <img src="assets/img/profile-img.jpg" alt="Profile">
					  <div class="pt-2">
						<a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
						<a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
					  </div>
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
					<div class="col-md-8 col-lg-9">
					  <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
					<div class="col-md-8 col-lg-9">
					  <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
					<div class="col-md-8 col-lg-9">
					  <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
					<div class="col-md-8 col-lg-9">
					  <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
					<div class="col-md-8 col-lg-9">
					  <input name="country" type="text" class="form-control" id="Country" value="USA">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
					<div class="col-md-8 col-lg-9">
					  <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
					<div class="col-md-8 col-lg-9">
					  <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
					<div class="col-md-8 col-lg-9">
					  <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
					<div class="col-md-8 col-lg-9">
					  <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
					<div class="col-md-8 col-lg-9">
					  <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
					<div class="col-md-8 col-lg-9">
					  <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
					<div class="col-md-8 col-lg-9">
					  <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
					</div>
				  </div>

				  <div class="text-center">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				  </div>
				</form><!-- End Profile Edit Form -->

			  </div>

			  <div class="tab-pane fade pt-3" id="profile-settings">

				<!-- Settings Form -->
				<form>

				  <div class="row mb-3">
					<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
					<div class="col-md-8 col-lg-9">
					  <div class="form-check">
						<input class="form-check-input" type="checkbox" id="changesMade" checked>
						<label class="form-check-label" for="changesMade">
						  Changes made to your account
						</label>
					  </div>
					  <div class="form-check">
						<input class="form-check-input" type="checkbox" id="newProducts" checked>
						<label class="form-check-label" for="newProducts">
						  Information on new products and services
						</label>
					  </div>
					  <div class="form-check">
						<input class="form-check-input" type="checkbox" id="proOffers">
						<label class="form-check-label" for="proOffers">
						  Marketing and promo offers
						</label>
					  </div>
					  <div class="form-check">
						<input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
						<label class="form-check-label" for="securityNotify">
						  Security alerts
						</label>
					  </div>
					</div>
				  </div>

				  <div class="text-center">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				  </div>
				</form><!-- End settings Form -->

			  </div>

			  <div class="tab-pane fade pt-3" id="profile-change-password">
				<!-- Change Password Form -->
				<form>

				  <div class="row mb-3">
					<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
					<div class="col-md-8 col-lg-9">
					  <input name="password" type="password" class="form-control" id="currentPassword">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
					<div class="col-md-8 col-lg-9">
					  <input name="newpassword" type="password" class="form-control" id="newPassword">
					</div>
				  </div>

				  <div class="row mb-3">
					<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
					<div class="col-md-8 col-lg-9">
					  <input name="renewpassword" type="password" class="form-control" id="renewPassword">
					</div>
				  </div>

				  <div class="text-center">
					<button type="submit" class="btn btn-primary">Change Password</button>
				  </div>
				</form><!-- End Change Password Form -->

			  </div>

			</div><!-- End Bordered Tabs -->

		  </div>
		</div>

	  </div>
	</div>
</section> --}}
@endsection