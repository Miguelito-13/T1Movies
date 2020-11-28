<?php
session_start();
// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: home.php");
    exit;
}
include('header.php');
include('navbar.php');
?>

<section class="container-fluid pb-4 mb-1 bg-light" style="margin-top: 120px; width: 85%">
    <div class="container custom-users-profile">
        <h3 class="pt-3">VERIFY EMAIL</h3>
        <hr />

        <?php
        $account_id = $_SESSION["id"];
        $sql = "SELECT * from users_account LEFT JOIN users_profile ON users_account.ACCOUNT_ID = users_profile.ACCOUNT_ID WHERE users_account.ACCOUNT_ID = '$account_id' LIMIT 1";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="signup-email" class="signup-label">Email Address</label><br>
                                <input id="signup-email" name="email" type="email" placeholder="<?= $row['EMAIL'] ?>" disabled />
                                <span id="verify-forgot" class="help-block text-success"><?php echo $verify_forgot; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($code_err_forgot)) ? 'has-error' : ''; ?>">
                                <label id="forgot-code-label" for="forgot-code" class="forgot-label">Verification Code</label>
                                <input id="forgot-code" name="code" type="text" placeholder="Enter code sent to your email" value="<?php echo $code_forgot; ?>" />
                                <span class="help-block text-danger"><?php echo $code_err_forgot; ?></span>
                                <span id="verify-code" class="help-block text-success"><?php echo $verify_code; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row d-flex justify-content-start">
                        <div class="col-2 my-auto">
                            <a href="profile.php" class="btn btn-outline btn-lg custom-cancel">CANCEL</a>
                        </div>
                        <div class="col-2 my-auto">
                            <input name="verify_email_button" type="submit" value="VERIFY" class="btn btn-lg custom-save">
                        </div>
                    </div>
                </form>
        <?php }
        } ?>
    </div>
</section>

<?php include('footer.php'); ?>
<script>
    //Show Verify Code
    let show_code = "<?php echo $show_code ?>";
    window.onload = function() {
        if (show_code === "show_code") {
            document.getElementById('forgot-code-label').style.display = "block";
            document.getElementById('forgot-code').style.display = "block";
        } else if (show_code === "reset") {
            document.getElementById('forgot-code-label').style.display = "none";
            document.getElementById('forgot-code').style.display = "none";
            document.getElementById('verify-code').style.display = "none";
            document.getElementById('verify-forgot').style.display = "none";
        }
    }
</script>