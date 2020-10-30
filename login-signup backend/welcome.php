<?php
session_start();

// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Welcome</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Hey <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to User Site</h1>
        <p>
            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>
    </div>

</body>

</html>