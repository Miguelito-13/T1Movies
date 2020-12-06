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
    <div class="signup-form">
        <h3 class="pt-3">PASSWORD RESET</h3>
        <hr />
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="row">
                    <div class="col-md-6 px-4">
                        <h4>ACCOUNT INFORMATION</h4>
                        <hr />
                        <div class="form-group <?php echo (!empty($username_err_forgot)) ? 'has-error' : ''; ?>">
                            <label for="forgot-username" class="forgot-label">Username</label>
                            <input id="forgot-username" name="username" type="text" placeholder="Enter registered Username" value="<?php echo $username_forgot; ?>" />
                            <span class="help-block text-danger"><?php echo $username_err_forgot; ?></span>
                            <span id="verify-forgot" class="help-block text-success"><?php echo $verify_forgot; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err_forgot)) ? 'has-error' : ''; ?>">
                            <label for="forgot-email" class="forgot-label">Email Address</label><br>
                            <input id="forgot-email" name="email" type="email" placeholder="Enter registered Email Address" value="<?php echo $email_forgot; ?>" />
                            <span class="help-block text-danger"><?php echo $email_err_forgot; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($code_err_forgot)) ? 'has-error' : ''; ?>">
                            <label id="forgot-code-label" for="forgot-code" class="forgot-label">Verification Code</label>
                            <input id="forgot-code" name="code" type="text" placeholder="Enter code sent to your email" value="<?php echo $code_forgot; ?>" />
                            <span class="help-block text-danger"><?php echo $code_err_forgot; ?></span>
                            <span id="verify-code" class="help-block text-success"><?php echo $verify_code; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err_forgot)) ? 'has-error' : ''; ?>">
                            <label id="forgot-password-label" for="forgot-password" class="forgot-label">Reset Password</label>
                            <input id="forgot-password" name="password" type="password" placeholder="Enter new Password" value="<?php echo $password_forgot; ?>" />
                            <span id="forgot-pass-error" class="help-block"><?php echo $password_err_forgot; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err_forgot)) ? 'has-error' : ''; ?>">
                            <input id="forgot-re-password" name="confirm_password" type="password" placeholder="Re-type new Password" value="<?php echo $confirm_password_forgot; ?>" />
                            <span id="forgot-confirm-error" class="help-block"><?php echo $confirm_password_err_forgot; ?></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr />
                        <div class="row">
                            <div class="col-md-2 my-2 ml-0 ml-md-5">
                                <a href="home.php" class="btn btn-outline btn-lg custom-cancel">CANCEL</a>
                            </div>
                            <div class="col-md-2 ml-0 ml-md-5">
                                <input name="forgot_button" type="submit" value="SUBMIT" class="btn btn-lg custom-signup">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include('termsandconditions.php'); ?>
<?php 
    include('footer.php'); 
    include('footer_scripts.php');
?>

<script>
    //Show Verify Code
    let show_code = "<?php echo $show_code ?>";
    window.onload = function() {
        if (show_code === "show_code") {
            document.getElementById('forgot-code-label').style.display = "block";
            document.getElementById('forgot-code').style.display = "block";
        } else if (show_code === "show_code2") {
            document.getElementById('forgot-code-label').style.display = "block";
            document.getElementById('forgot-code').style.display = "block";
            document.getElementById('forgot-password-label').style.display = "block";
            document.getElementById('forgot-password').style.display = "block";
            document.getElementById('forgot-re-password').style.display = "block";
        } else if (show_code === "show_code3") {
            document.getElementById('forgot-code-label').style.display = "block";
            document.getElementById('forgot-code').style.display = "block";
            document.getElementById('forgot-password-label').style.display = "block";
            document.getElementById('forgot-password').style.display = "block";
            document.getElementById('forgot-re-password').style.display = "block";
            document.getElementById('forgot-pass-error').style.color = "#dc3545";
            document.getElementById('forgot-confirm-error').style.color = "#dc3545";
        } else if (show_code === "reset") {
            document.getElementById('forgot-code-label').style.display = "none";
            document.getElementById('forgot-code').style.display = "none";
            document.getElementById('forgot-password-label').style.display = "none";
            document.getElementById('forgot-password').style.display = "none";
            document.getElementById('forgot-re-password').style.display = "none";
            document.getElementById("forgot-username").value = "";
            document.getElementById("forgot-email").value = "";
            document.getElementById('verify-code').style.display = "none";
            document.getElementById('verify-forgot').style.display = "none";
            document.getElementById('id01').style.display = "block";
        }
    }
</script>