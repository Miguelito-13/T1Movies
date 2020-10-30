<?php
// Include config
require_once "config.php";

// Define variables
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$email = "";
$email_err = "";

// Process Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // SQL SELECT
        $sql = "SELECT ACCOUNT_ID FROM users_account WHERE USERNAME = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind vars
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set params
            $param_username = trim($_POST["username"]);

            // Execute
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Validate
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        // SQL SELECT
        $sql = "SELECT ACCOUNT_ID FROM users_account WHERE EMAIL = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind vars
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set params
            $param_email = trim($_POST["email"]);

            // Execute
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already registered.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Validate
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check errors
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // SQL INSERT
        $sql = "INSERT INTO users_account (USERNAME, EMAIL, ACCOUNT_PASSWORD) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind vars
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

            // Set params
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Execute
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sign Up</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-danger" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>