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


<section class="container-fluid pb-4 mb-1" style="margin-top: 20px; width: 85%">
    <div class="container custom-users-profile">
        <h3 class="pt-3">EDIT ACCOUNT</h3>
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
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-username" class="signup-label">Username</label>
                                <input id="signup-username" name="username" type="text" placeholder="<?= $row['USERNAME'] ?>" value="<?php echo $username; ?>" pattern="[a-zA-Z0-9_]{1,}" title="A-Z, a-z, 0-9, _ are only allowed" />
                                <span class="help-block text-danger"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-email" class="signup-label">Email Address</label><br>
                                <input id="signup-email" name="email" type="email" placeholder="<?= $row['EMAIL'] ?>" value="<?php echo $email; ?>" />
                                <span class="help-block text-danger"><?php echo $email_err; ?></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-password" class="signup-label">New Password</label>
                                <input id="signup-password" name="password" type="password" placeholder="Enter new Password" value="<?php echo $password; ?>" />
                                <span class=" help-block text-danger"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <input id="signup-re-password" name="confirm_password" type="password" placeholder="Re-type new Password" value="<?php echo $confirm_password; ?>" />
                                <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row d-flex justify-content-end">
                        <div class="col-2 my-auto">
                            <a href="profile.php" class="btn btn-outline btn-lg custom-cancel">CANCEL</a>
                        </div>
                        <div class="col-2 my-auto">
                            <input name="edit_account_button" type="submit" value="SAVE" class="btn btn-lg custom-save">
                        </div>
                    </div>
                </form>
        <?php }
        } ?>
    </div>
</section>

<?php include('footer.php'); ?>