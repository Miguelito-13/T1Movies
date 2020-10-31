<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

	<section class="container-fluid" style="margin-top: 150px; width:90%">
		<div class="signup-form">
			<h3>REGISTER</h3>
			<hr/>
			<div class="row">
				<div class="col-md-6 px-4">
					<h4>USERNAME AND PASSWORD</h4> <hr/>
					<p> 
						<label for="signup-username" class="signup-label" >Username</label>
						<input id="signup-username" name="username" required="required" type="text" placeholder="Enter your Username" />
					</p>
					<p> 
						<label for="signup-password" class="signup-label" >Password</label>
						<input id="signup-password" name="password" required="required" type="password" placeholder="Enter your Password" />
						<input id="signup-re-password" name="re-password" required="required" type="password" placeholder="Re-type your Password" />
					</p>
				</div>

				<div class="col-md-6 px-4">
					<h4>PERSONAL INFORMATION</h4> <hr/>
					<p> 
						<label for="signup-fname" class="signup-label" >First Name</label><br>
						<input id="signup-fname" name="firstname" required="required" type="text" placeholder="Enter your First Name" />
					</p>
					<p> 
						<label for="signup-name" class="signup-label" >Middle Name</label><br>
						<input id="signup-mname" name="middle" type="text" placeholder="Enter your Middle Name" />
					</p>
					<p> 
						<label for="signup-lname" class="signup-label" >Last Name</label><br>
						<input id="signup-lname" name="lastname" required="required" type="text" placeholder="Enter your Last Name" />
					</p>
					<div class="row">
					<div class="col-md-2">
							<p> 
								<label for="signup-age" class="signup-label" >Age</label><br>
								<input id="signup-age" name="age" required="required" type="number" min="1" max="100" placeholder="Age" />
							</p>					
						</div>
						<div class="col-md-5">
							<p> 
								<label for="signup-bdate" class="signup-label" >Birth Date</label><br>
								<input id="signup-bdate" name="bdate" required="required" type="date" />
							</p>					
						</div>
						<div class="col-md-5">
							<p> 
								<label for="signup-gender" class="signup-label" >Sex</label><br>
								<form class="gender-form">
									<input id="signup-gender" name="gender" class="radio-button" type="radio" value="male">
									<label for="signup-gender">Male &nbsp;</label>
									<input id="signup-gender" name="gender" class="radio-button" type="radio" value="female">
									<label for="signup-gender">Female</label> 
								</form>
							</p>					
						</div>
					</div>
					
				</div>

				<div class="col-md-6 px-4">
					<h4>CONTACT INFORMATION</h4> <hr/>
					<p> 
						<label for="signup-email" class="signup-label" >Email Address</label><br>
						<input id="signup-email" name="email" required="required" type="email" placeholder="Enter your Email Address" />
					</p>
					<p> 
						<label for="signup-email" class="signup-label" >Contact Number</label><br>
						<input id="signup-email" name="email" required="required" type="number" max-length="11" placeholder="09***********"/>
					</p>
					<p> 
						<label for="signup-address" class="signup-label" >Address</label><br>
						<input id="signup-address" name="address" required="required" type="text" placeholder="Enter your Address" />
					</p>
			</div>

			<div class="col-md-12">
				<hr/>
				<div class="row">
					<div class="col-md-8">
						<form class=signup-confirmation>
							<div class="form-check form-check-inline custom-form-check">
								<input id="form-check-input signup-checkbox" name="confirmation" class="check-box" type="checkbox" value="confirmation">
								<label for="form-check-label signup-checkbox" class="confirmation-label">I have read and agree to the <a data-toggle="modal" data-target="#tncModal">Terms and Conditions</a> of T1 Movies.</label> 
							</div>
						</form>
					</div>
					<div class="col-md-2">
						<button class="btn btn-outline btn-lg custom-cancel">CANCEL</button>
					</div>
					<div class="col-md-2">
					<button class="btn btn-lg custom-signup">SIGN UP</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include('termsandconditions.php'); ?>
	<?php include('footer.php'); ?>


<script>
	document.querySelector("#bdate").valueAsDate = new Date();
</script>