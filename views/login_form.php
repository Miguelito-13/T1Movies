<?php include('../config/functions.php'); ?>

<div class="modal-content animate">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        </div>

        <div class="container">
            <h1 class="mx-auto my-4 font-weight-bold">Login</h1>
            <hr />
            <div class="login-container w-100">
                <div class="<?php echo (!empty($username_err_login)) ? 'has-error' : ''; ?>">
                    <label><b>Username</b></label>
                    <input id="uText" type="text" placeholder="Enter Username or Email" name="username" value="<?php echo $username_login; ?>">
                    <span id="error1" class="help-block text-danger"><?php echo $username_err_login; ?></span>
                </div>
                <div class="mt-2 <?php echo (!empty($password_err_login)) ? 'has-error' : ''; ?>">
                    <label><b>Password</b></label>
                    <input id="pText" type="password" placeholder="Enter Password" name="password">
                    <span id="error2" class="help-block text-danger"><?php echo $password_err_login; ?></span>
                </div>
                <input name="login_button" type="submit" value="Login">
                <br>
                <span class="psw">
                    <a href="#">Forgot password?</a>
                </span>
            </div>
        </div>

        <div class="signup-container">
            <!-- <p>Not a member yet? <a class="to_register" href="signup_form.php">Join us</a></p> -->
            <!-- <p>Not a member yet? <a class="to_register" onclick="document.getElementById('id02').style.display='block'">Join us</a></p> -->
            <p>Not a member yet? <a class="to_register" href="signup_form.php">Join us</a></p>
        </div>
    </form>
</div>

<script>
    // Modal call
    let modal = document.getElementById('id01');

    //Close when clicked outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.getElementById('error1').style.display = 'none';
            document.getElementById('error2').style.display = 'none';
            document.getElementById("uText").value = "";
            document.getElementById("pText").value = "";
        }
    }

    //Show Login
    let show = "<?php echo $show ?>";
    window.onload = function() {
        if (show === "show") {
            document.getElementById('id01').style.display = "block";
        }
    }
</script>