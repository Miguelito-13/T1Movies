<?php

session_start();

// Check if user already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] === 'ADMIN') {
		header("location: admin_site.php");
	} else {
		header("location: home.php");
	}
	exit;
}

include('header.php');
include('navbar.php');

?>

<section class="container-fluid bg-light pb-4" style="margin-top: 150px; width:90%">
	<div class="signup-form ">
		<h3 class="pt-3">REGISTER</h3>
		<hr />
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="row">
				<div class="col-md-6 px-4">
					<h4>USERNAME AND PASSWORD</h4>
					<hr />
					<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<label for="signup-username" class="signup-label">Username</label>
						<input id="signup-username" name="username" type="text" placeholder="Enter your Username" value="<?php echo $username; ?>" pattern="[a-zA-Z0-9_]{1,}" title="A-Z, a-z, 0-9, _ are only allowed" />
						<span class="help-block text-danger"><?php echo $username_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<label for="signup-password" class="signup-label">Password</label>
						<input id="signup-password" name="password" type="password" placeholder="Enter your Password" value="<?php echo $password; ?>" />
						<span class=" help-block text-danger"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
						<input id="signup-re-password" name="confirm_password" type="password" placeholder="Re-type your Password" value="<?php echo $confirm_password; ?>" />
						<span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
					</div>
				</div>

				<div class="col-md-6 px-4">
					<h4>PERSONAL INFORMATION</h4>
					<hr />
					<div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
						<label for="signup-fname" class="signup-label">First Name</label><br>
						<input id="signup-fname" name="firstName" type="text" placeholder="Enter your First Name" value="<?php echo $firstName; ?>" pattern="[a-zA-Z]{1,}" title="First name only." />
						<span class="help-block text-danger"><?php echo $firstName_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($middleInitial_err)) ? 'has-error' : ''; ?>">
						<label for="signup-name" class="signup-label">Middle Initial (optional)</label><br>
						<input id="signup-mname" name="middleInitial" type="text" placeholder="Enter your Middle Initial" value="<?php echo $middleInitial; ?>" pattern="[a-zA-Z]{1,}" title="Middle initial only" />
						<span class=" help-block text-danger"><?php echo $middleInitial_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
						<label for="signup-lname" class="signup-label">Last Name</label><br>
						<input id="signup-lname" name="lastName" type="text" placeholder="Enter your Last Name" value="<?php echo $lastName; ?>" pattern="[a-zA-Z]{1,}" title="Last name only" />
						<span class="help-block text-danger"><?php echo $lastName_err; ?></span>
					</div>
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group <?php echo (!empty($bdate_err)) ? 'has-error' : ''; ?>">
								<label for="signup-bdate" class="signup-label">Birth Date</label><br>
								<input id="signup-bdate" name="bdate" type="date" value="<?php echo $bdate; ?>" />
							</div>
							<span class="help-block text-danger"><?php echo $bdate_err; ?></span>
						</div>
						<div class="col-sm-7">
							<div class="form-group <?php echo (!empty($sex_err)) ? 'has-error' : ''; ?>">
								<label for="signup-gender" class="signup-label">Sex</label><br>
								<form class="gender-form">
									<input id="signup-gender-male" name="sex" class="radio-button" type="radio" value=1 <?php echo $sex_male_check; ?> />
									<label for="signup-gender-male">Male &nbsp;</label>
									<input id="signup-gender-female" name="sex" class="radio-button" type="radio" value=2 <?php echo $sex_female_check; ?> />
									<label for="signup-gender-female">Female</label>
								</form>
								<br><span class="help-block text-danger"><?php echo $sex_err; ?></span>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-6 px-4">
					<h4>CONTACT INFORMATION</h4>
					<hr />
					<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
						<label for="signup-email" class="signup-label">Email Address</label><br>
						<input id="signup-email" name="email" type="email" placeholder="Enter your Email Address" value="<?php echo $email; ?>" />
						<span class="help-block text-danger"><?php echo $email_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
						<label for="signup-contact" class="signup-label">Contact Number</label><br>
						<input id="signup-contact" name="contact" type="tel" placeholder="09*********" value="<?php echo $contact; ?>" pattern="[0]{1}[9]{1}[0-9]{9}" title="09********* (11-digits)" />
						<span class="help-block text-danger"><?php echo $contact_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
						<label for="signup-address" class="signup-label">Address</label><br>
						<input id="signup-address" name="address" type="text" placeholder="Enter your Address" value="<?php echo $address; ?>" />
						<span class="help-block text-danger"><?php echo $address_err; ?></span>
					</div>
				</div>

				<div class="col-md-12">
					<hr />
					<div class="row">
						<div class="col-md-8 mb-4">
							<div class="<?php echo (!empty($terms_err)) ? 'has-error' : ''; ?>">
								<div class=signup-confirmation>
									<div class="form-check form-check-inline custom-form-check">
										<input id="form-check signup-checkbox" name="terms" class="check-box" type="checkbox" <?php echo $terms_check; ?>>
										<label for="form-check signup-checkbox" class="confirmation-label">I have read and agree to the <a data-toggle="modal" data-target="#tncModal"><u>Terms and Conditions</u></a> of T1 Movies.</label>
									</div>
								</div>
								<span class="help-block text-danger"><?php echo $terms_err; ?></span>
							</div>
						</div>
						<div class="col-md-2 my-2">
							<a href="home.php" class="btn btn-outline btn-lg custom-cancel">CANCEL</a>
						</div>
						<div class="col-md-2">
							<input name="register_button" type="submit" value="SIGN UP" class="btn btn-lg custom-signup">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php include('termsandconditions.php'); ?>
<?php include('footer.php'); ?>