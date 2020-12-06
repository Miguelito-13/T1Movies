<<<<<<< HEAD
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
        <h3 class="pt-3">EDIT ACCOUNT</h3>
        <hr />

        <?php
        $account_id = $_SESSION["id"];
        $sql = "SELECT * from users_account LEFT JOIN users_profile ON users_account.ACCOUNT_ID = users_profile.ACCOUNT_ID WHERE users_account.ACCOUNT_ID = '$account_id' LIMIT 1";
        $res = mysqli_query($link,  $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <?php /*
            <div class="row">
                <div class="col-9 col-md-3 mx-auto px-auto custom-profile-picture mb-3">
                    <img src="<?php echo $image; ?>" class="d-flex justify-content-center profile-picture">

                    <!-- upload image -->
                    <div>
                        <form id="upload_image" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label" for="input01">Image:</label>
                                <div class="controls">
                                    <input type="file" name="image" class="font" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="submit" class="btn custom-upload-btn d-flex justify-content-center">
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                            $image_name = addslashes($_FILES['image']['name']);
                            $image_size = getimagesize($_FILES['image']['tmp_name']);

                            move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
                            $location = "images/" . $_FILES["image"]["name"];
                            $conn->query("update members set image = '$location' where member_id  = '$session_id' ");
                        ?>

                            <script>
                                window.location = 'home.php';
                            </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        */ ?>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-username" class="signup-label">Username</label>
                                <input id="signup-username" name="username" type="text" placeholder="Enter your Username" value="<?php echo $username; ?>" pattern="[a-zA-Z0-9_]{1,}" title="A-Z, a-z, 0-9, _ are only allowed" />
                                <span class="help-block text-danger"><?php echo $username_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-email" class="signup-label">Email Address</label><br>
                                <input id="signup-email" name="email" type="email" placeholder="Enter your Email Address" value="<?php echo $email; ?>" />
                                <span class="help-block text-danger"><?php echo $email_err; ?></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
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
                    </div>


                    <hr />
                    <div class="row d-flex justify-content-end">
                        <div class="col-2 my-auto">
                            <a href="profile.php" class="btn btn-outline btn-lg custom-cancel">CANCEL</a>
                        </div>
                        <div class="col-2 my-auto">
                            <input name="save_edit_button" type="submit" value="SAVE" class="btn btn-lg custom-save">
                        </div>
                    </div>
                </form>
        <?php }
        } ?>
    </div>
</section>

<?php 
    include('footer.php'); 
    include('footer_scripts.php');
?>
=======
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
>>>>>>> 07e63dec4acbb2372b6fbb3f7f3ea5583811f7dc
