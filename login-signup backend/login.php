<?php
session_start();

// Check user login
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config
require_once "config.php";

// Define variables
$username = $password = "";
$username_err = $password_err = "";
$email = "";

// Process Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
        $email = trim($_POST["username"]);
    }

    // Check
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate
    if (empty($username_err) && empty($password_err)) {

        // SQL Select
        $sql_user = "SELECT ACCOUNT_ID, USERNAME, ACCOUNT_PASSWORD FROM users_account WHERE USERNAME = ?";
        $sql_email = "SELECT ACCOUNT_ID, EMAIL, ACCOUNT_PASSWORD FROM users_account WHERE EMAIL = ?";
        $stmt_user = mysqli_prepare($link, $sql_user);
        $stmt_email = mysqli_prepare($link, $sql_email);

        // Bind vars
        mysqli_stmt_bind_param($stmt_user, "s", $param_username);
        mysqli_stmt_bind_param($stmt_email, "s", $param_email);

        // Set params
        $param_username = $username;
        $param_email = $email;

        // Execute
        if (mysqli_stmt_execute($stmt_user)) {
            mysqli_stmt_store_result($stmt_user);

            // Check username
            if (mysqli_stmt_num_rows($stmt_user) == 1) {
                mysqli_stmt_bind_result($stmt_user, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt_user)) {
                    if (password_verify($password, $hashed_password)) {
                        session_start();

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username; // TODO: REMOVE IN FUTURE

                        // Check admin
                        $query = "SELECT * FROM users_account WHERE USERNAME='$username' LIMIT 1";
                        $results = mysqli_query($link, $query);

                        $logged_in_user = mysqli_fetch_assoc($results);

                        // Admin
                        if ($logged_in_user['ADMIN'] == 'admin') {
                            header("location: admin_site.php");
                        }
                        // User
                        else {
                            header("location: welcome.php");
                        }
                    } else {
                        $password_err = "The password you entered was invalid.";
                    }
                }
            }

            // Check email
            else if (mysqli_stmt_execute($stmt_email)) {
                mysqli_stmt_store_result($stmt_email);

                if (mysqli_stmt_num_rows($stmt_email) == 1) {
                    mysqli_stmt_bind_result($stmt_email, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt_email)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $email; // TODO: REMOVE IN FUTURE

                            // Check admin
                            $query = "SELECT * FROM users_account WHERE EMAIL='$email' LIMIT 1";
                            $results = mysqli_query($link, $query);

                            $logged_in_user = mysqli_fetch_assoc($results);

                            // Admin
                            if ($logged_in_user['ADMIN'] == 'admin') {
                                header("location: admin_site.php");
                            }
                            // User
                            else {
                                header("location: welcome.php");
                            }
                        } else {
                            $password_err = "The password you entered was invalid.";
                        }
                    }
                }
                // Account not found 
                else {
                    $username_err = "The username and password that you entered did not match our records.";
                }
            }
        } else {
            echo "Something went wrong. Please reload or try again later.";
        }

        mysqli_stmt_close($stmt_user);
        mysqli_stmt_close($stmt_email);
    }

    // Close
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username or Email</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>

</html>