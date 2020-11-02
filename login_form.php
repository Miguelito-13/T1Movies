<?php include('./config/functions.php'); ?>

<div class="modal-content animate">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        </div>

        <div class="container">
            <h1 class="login-modal">Login</h1>
            <hr />
            <div class="login-container">
                <div class="<?php echo (!empty($username_err_login)) ? 'has-error' : ''; ?>">
                    <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username or Email" name="username" value="<?php echo $username_login; ?>">
                    <span class="help-block text-danger"><?php echo $username_err_login; ?></span>
                </div>
                <div class="<?php echo (!empty($password_err_login)) ? 'has-error' : ''; ?>">
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password">
                    <span class="help-block text-danger"><?php echo $password_err_login; ?></span>
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