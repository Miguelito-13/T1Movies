<form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
    </div>

    <div class="container">
        <h1 class="login-modal">Login</h1>
        <hr />
        <div class="login-container">
            <label><b>Email Address</b></label>
            <input type="text" placeholder="Enter Email Address" name="email" required="required">

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required="required">

            <button type="submit">Login</button><br>
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

<script>
    // Modal call
    let modal = document.getElementById('id02');

    //Close when clicked outside
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>