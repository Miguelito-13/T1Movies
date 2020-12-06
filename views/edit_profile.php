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
        <h3 class="pt-3">EDIT PROFILE</h3>
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
                            <div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-fname" class="signup-label">First Name</label><br>
                                <input id="signup-fname" name="firstName" type="text" placeholder="Enter your First Name" value="<?= $row['FIRST_NAME']; ?>" pattern="[a-zA-Z]{1,}" title="First name only." />
                                <span class="help-block text-danger"><?php echo $firstName_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($middleInitial_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-name" class="signup-label">Middle Initial (optional)</label><br>
                                <input id="signup-mname" name="middleInitial" type="text" placeholder="Enter your Middle Initial" value="<?= $row['MI']; ?>" pattern="[a-zA-Z]{1,}" title="Middle initial only" />
                                <span class=" help-block text-danger"><?php echo $middleInitial_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-lname" class="signup-label">Last Name</label><br>
                                <input id="signup-lname" name="lastName" type="text" placeholder="Enter your Last Name" value="<?= $row['LAST_NAME']; ?>" pattern="[a-zA-Z]{1,}" title="Last name only" />
                                <span class="help-block text-danger"><?php echo $lastName_err; ?></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-address" class="signup-label">Address</label><br>
                                <input id="signup-address" name="address" type="text" placeholder="Enter your Address" value="<?= $row['ADDRESS']; ?>" />
                                <span class="help-block text-danger"><?php echo $address_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                                <label for="signup-contact" class="signup-label">Contact Number</label><br>
                                <input id="signup-contact" name="contact" type="tel" placeholder="<?= $row['CONTACT_NO'] ?>" value="<?php echo $contact; ?>" pattern="[0]{1}[9]{1}[0-9]{9}" title="09********* (11-digits)" />
                                <span class="help-block text-danger"><?php echo $contact_err; ?></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group <?php echo (!empty($bdate_err)) ? 'has-error' : ''; ?>">
                                        <label for="signup-bdate" class="signup-label">Birth Date</label><br>
                                        <input id="signup-bdate" name="bdate" type="date" value="<?= $row['BIRTHDATE']; ?>" />
                                    </div>
                                    <span class="help-block text-danger"><?php echo $bdate_err; ?></span>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="signup-gender" class="signup-label">Sex</label><br>
                                        <input id="signup-gender-male" name="sex" class="radio-button" type="radio" value=1 <?php if ($row['GENDER_ID'] == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                        <label for="signup-gender-male">Male &nbsp;</label>
                                        <input id="signup-gender-female" name="sex" class="radio-button" type="radio" value=2 <?php if ($row['GENDER_ID'] == 2) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?> />
                                        <label for="signup-gender-female">Female</label>
                                    </div>
                                </div>
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

<?php include('footer.php'); ?>