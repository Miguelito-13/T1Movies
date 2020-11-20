<?php
// Session already started at index.php

// Include config
require_once "config.php";

// Login variables
$username_login = $password_login = "";
$username_err_login = $password_err_login = "";
$email_login = "";

// Register variables
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$email = $email_err = "";
$firstName = $middleInitial = $lastName = "";
$firstName_err = $middleInitial_err = $lastName_err = "";
$address = $address_err = "";
$contact = $contact_err = "";
$bdate = $bdate_err = "";
$sex = $sex_err = $sex_male_check = $sex_female_check = "";
$terms_err = $terms_check = "";

// Forgot variables
$username_forgot = $username_err_forgot = "";
$email_forgot = $email_err_forgot = "";
$code_forgot = $code_err_forgot = "";
$password_forgot = $password_err_forgot = "";
$confirm_password_forgot = $confirm_password_err_forgot = "";
$verify_forgot = $verify_code = "";
$code = "";

// Process Login
if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["login_button"]))) {

    // Check
    if (empty(trim($_POST["username"]))) {
        $show = "show";
        $username_err_login = "Please enter username.";
    } else {
        $username_login = trim($_POST["username"]);
        $email_login = trim($_POST["username"]);
    }

    // Check
    if (empty(trim($_POST["password"]))) {
        $show = "show";
        $password_err_login = "Please enter your password.";
    } else {
        $password_login = trim($_POST["password"]);
    }

    // Validate
    if (empty($username_err_login) && empty($password_err_login)) {

        // SQL Select
        $sql_user_login = "SELECT ACCOUNT_ID, USERNAME, ACCOUNT_PASSWORD FROM users_account WHERE USERNAME = ?";
        $sql_email_login = "SELECT ACCOUNT_ID, EMAIL, ACCOUNT_PASSWORD FROM users_account WHERE EMAIL = ?";
        $stmt_user_login = mysqli_prepare($link, $sql_user_login);
        $stmt_email_login = mysqli_prepare($link, $sql_email_login);

        // Bind vars
        mysqli_stmt_bind_param($stmt_user_login, "s", $param_username_login);
        mysqli_stmt_bind_param($stmt_email_login, "s", $param_email_login);

        // Set params
        $param_username_login = $username_login;
        $param_email_login = $email_login;

        // Execute
        if (mysqli_stmt_execute($stmt_user_login)) {
            mysqli_stmt_store_result($stmt_user_login);

            // Check username
            if (mysqli_stmt_num_rows($stmt_user_login) == 1) {
                mysqli_stmt_bind_result($stmt_user_login, $id_login, $username_login, $hashed_password_login);
                if (mysqli_stmt_fetch($stmt_user_login)) {
                    if (password_verify($password_login, $hashed_password_login)) {

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id_login;
                        $_SESSION["username"] = $username_login;

                        // Check admin
                        $query_login = "SELECT * FROM users_account WHERE USERNAME='$username_login' LIMIT 1";
                        $results_login = mysqli_query($link, $query_login);

                        $logged_in_user_login = mysqli_fetch_assoc($results_login);

                        // Admin
                        if ($logged_in_user_login['ADMIN'] == 'ADMIN') {
                            $_SESSION["user_type"] = $logged_in_user_login['ADMIN'];
                            header("location: ./admin_site.php");
                        }
                        // User
                        else {
                            $_SESSION["user_type"] = $logged_in_user_login['ADMIN'];
                            header("location: ./home.php");
                        }
                    } else {
                        $show = "show";
                        $password_err_login = "The password you entered was invalid.";
                    }
                }
            }

            // Check email
            else if (mysqli_stmt_execute($stmt_email_login)) {
                mysqli_stmt_store_result($stmt_email_login);

                if (mysqli_stmt_num_rows($stmt_email_login) == 1) {
                    mysqli_stmt_bind_result($stmt_email_login, $id_login, $email_login, $hashed_password_login);
                    if (mysqli_stmt_fetch($stmt_email_login)) {
                        if (password_verify($password_login, $hashed_password_login)) {

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id_login;
                            $_SESSION["email"] = $email_login;

                            // Check admin
                            $query_login = "SELECT * FROM users_account WHERE EMAIL='$email_login' LIMIT 1";
                            $results_login = mysqli_query($link, $query_login);

                            $logged_in_user_login = mysqli_fetch_assoc($results_login);

                            // Admin
                            if ($logged_in_user_login['ADMIN'] != 'ADMIN') {
                                $_SESSION["user_type"] = $logged_in_user_login['ADMIN'];
                                header("location: ./admin_site.php");
                            }
                            // User
                            else {
                                $_SESSION["user_type"] = $logged_in_user_login['ADMIN'];
                                header("location: ./home.php");
                            }
                        } else {
                            $show = "show";
                            $password_err_login = "The password you entered was invalid.";
                        }
                    }
                }
                // Account not found 
                else {
                    $show = "show";
                    $username_err_login = "The username and password that you entered did not match our records.";
                }
            }
        } else {
            echo "Something went wrong. Please reload or try again later.";
        }

        mysqli_stmt_close($stmt_user_login);
        mysqli_stmt_close($stmt_email_login);
    }
}

// Process Register
else if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["register_button"]))) {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else if (strlen(trim($_POST["username"])) < 4) {
        $username_err = "Username must have atleast 4 characters.";
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

    // Validate email
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

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate firstname
    if (empty(trim($_POST["firstName"]))) {
        $firstName_err = "Please enter your first name.";
    } else {
        $firstName = ucfirst($_POST["firstName"]);
    }

    // Validate m.i.
    if (empty(trim($_POST["middleInitial"]))) {
    } else if (strlen(trim($_POST["middleInitial"])) > 1) {
        $middleInitial_err = "Please enter your valid middle initial";
    } else {
        $middleInitial = ucfirst($_POST["middleInitial"]);
    }

    // Validate lastname
    if (empty(trim($_POST["lastName"]))) {
        $lastName_err = "Please enter your last name.";
    } else {
        $lastName = ucfirst($_POST["lastName"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    } else {
        $address = $_POST["address"];
    }

    // Validate bdate
    if (empty($_POST["bdate"])) {
        $bdate_err = "Please enter your birth date.";
    } else {
        $bdate = $_POST["bdate"];

        // Validate age
        $birthdate = new DateTime($bdate);
        $today = new DateTime();
        $age = $birthdate->diff($today)->y;
        if ($age < 10) {
            $bdate_err = "User must be 10y/o and above.";
        } else if ($age > 100) {
            $bdate_err = "User must be still alive.";
        }
    }

    // Validate sex
    if (isset($_POST['sex'])) {
        $sex = $_POST['sex'];
        if ($sex == 1) {
            $sex_male_check = "checked";
        } else {
            $sex_female_check = "checked";
        }
    } else {
        $sex_err = "Please enter your sex.";
    }

    // Validate terms
    if (empty($_POST['terms'])) {
        $terms_err = "Please read and agree to our Terms & Conditions.";
    } else {
        $terms_check = "checked";
    }

    // Validate Contact
    if (empty(trim($_POST["contact"]))) {
        $contact_err = "Please enter your contact number.";
    } else if (strlen(trim($_POST["contact"])) == 11) {
        // SQL SELECT
        $sql = "SELECT USERS_ID FROM users_profile WHERE CONTACT_NO = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind vars
            mysqli_stmt_bind_param($stmt, "s", $param_contact);

            // Set params
            $param_contact = trim($_POST["contact"]);

            // Execute
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $contact_err = "This contact is already registered.";
                } else {
                    $contact = trim($_POST["contact"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        $contact_err = "Please enter a valid 11-digit contact number.";
    }

    // Check errors
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($firstName_err) && empty($middleInitial_err) && empty($lastName_err) && empty($address_err) && empty($contact_err) && empty($bdate_err) && empty($sex_err) && empty($terms_err)) {

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
                $query = "SELECT * FROM users_account WHERE ACCOUNT_ID";
                $results = mysqli_query($link, $query);

                while ($row = mysqli_fetch_assoc($results)) {
                    if ($row["USERNAME"] === $param_username) {
                        $account_id = $row["ACCOUNT_ID"];
                    }
                }

                $sql2 = "INSERT INTO users_profile (ACCOUNT_ID, FIRST_NAME, LAST_NAME, MI, CONTACT_NO, ADDRESS, GENDER_ID, BIRTHDATE, AGE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt2 = mysqli_prepare($link, $sql2);
                mysqli_stmt_bind_param($stmt2, "isssssisi", $param_account_id, $param_firstName, $param_lastName, $param_MI, $param_contact, $param_address, $param_sex, $param_bdate, $param_age);
                $param_account_id = $account_id;
                $param_firstName = $firstName;
                $param_lastName = $lastName;
                $param_MI = $middleInitial;
                $param_contact = $contact;
                $param_address = $address;
                $param_sex = $sex;
                $param_bdate = $bdate;
                $param_age = $age;
                mysqli_stmt_execute($stmt2);

                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id_login;
                $_SESSION["email"] = $email_login;

                echo '<script type="text/javascript">alert("Sign up Successful. Directing you to the home page."); window.location = "./home.php"; </script>';
            } else {
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
            mysqli_stmt_close($stmt2);
        }
    }
}

// Process Forgot Password
else if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["forgot_button"]))) {

    // Check
    if (empty(trim($_POST["username"]))) {
        $username_err_forgot = "Please enter username.";
    } else {
        $username_forgot = trim($_POST["username"]);
    }

    // Check
    if (empty(trim($_POST["email"]))) {
        $email_err_forgot = "Please enter email.";
    } else {
        $email_forgot = trim($_POST["email"]);
    }

    // Validate
    if (empty($username_err_forgot) && empty($email_err_forgot)) {

        // SQL Select
        $sql_forgot = "SELECT ACCOUNT_ID, USERNAME, EMAIL FROM users_account WHERE USERNAME = ?";
        $stmt_forgot = mysqli_prepare($link, $sql_forgot);

        // Bind vars
        mysqli_stmt_bind_param($stmt_forgot, "s", $param_username_forgot);

        // Set params
        $param_username_forgot = $username_forgot;

        // Execute
        if (mysqli_stmt_execute($stmt_forgot)) {
            mysqli_stmt_store_result($stmt_forgot);

            // Check username
            if (mysqli_stmt_num_rows($stmt_forgot) == 1) {

                // Check
                $query_forgot = "SELECT * FROM users_account WHERE USERNAME='$username_forgot' LIMIT 1";
                $results_forgot = mysqli_query($link, $query_forgot);

                $fetch_forgot = mysqli_fetch_assoc($results_forgot);

                // Email
                if ($fetch_forgot['EMAIL'] == $email_forgot) {
                    $verify_forgot = "Username and Email matched.";
                    $show_code = "show_code";

                    if (empty($_POST["code"])) {

                        // Check existing code
                        while ($code == "") {
                            $temp_code = rand(300000, 500000);

                            // SQL Select
                            $sql_check = "SELECT * FROM users_account WHERE VERIFY_CODE = '$temp_code'";
                            $stmt_check = mysqli_prepare($link, $sql_check);

                            // Execute
                            mysqli_stmt_execute($stmt_check);
                            mysqli_stmt_store_result($stmt_check);

                            // Check code
                            if (mysqli_stmt_num_rows($stmt_check) == 0) {
                                $code = $temp_code;
                            }

                            mysqli_stmt_close($stmt_check);
                        }

                        include('sendEmail.php');
                        $verify_code = "Enter code sent to your email.";

                        // Insert code
                        $sql = "UPDATE users_account SET VERIFY_CODE = '$code' WHERE USERNAME = '$username_forgot'";
                        mysqli_query($link, $sql);
                    } else {
                        $code_forgot = trim($_POST["code"]);

                        // Check code
                        $query_code = "SELECT * FROM users_account WHERE USERNAME ='$username_forgot' LIMIT 1";
                        $results_code = mysqli_query($link, $query_code);

                        $code_check = mysqli_fetch_assoc($results_code);

                        if ($code_forgot === $code_check['VERIFY_CODE']) {
                            $show_code = "show_code2";
                            $verify_code = "Code is verified.";

                            // Validate password
                            if (empty(trim($_POST["password"]))) {
                                $password_err_forgot = "Please enter a new password.";
                            } elseif (strlen(trim($_POST["password"])) < 6) {
                                $show_code = "show_code3";
                                $password_err_forgot = "Password must have atleast 6 characters.";
                            } else {
                                $password_forgot = trim($_POST["password"]);
                            }
                            // Validate confirm password
                            if (empty(trim($_POST["confirm_password"]))) {
                                $confirm_password_err_forgot = "Please confirm password.";
                            } else {
                                $show_code = "show_code3";
                                $confirm_password_forgot = trim($_POST["confirm_password"]);
                                if (empty($password_err_forgot) && ($password_forgot != $confirm_password_forgot)) {
                                    $confirm_password_err_forgot = "Password did not match.";
                                }
                            }

                            // Set new password
                            if (empty($password_err_forgot) && empty($confirm_password_err_forgot)) {
                                date_default_timezone_set('Asia/Manila');
                                $dt = new DateTime();
                                $today = $dt->format('Y-m-d H:i:s');

                                $sql_reset = "UPDATE users_account SET ACCOUNT_PASSWORD = ?, MODIFIED_ON = '$today' WHERE USERNAME = '$username_forgot'";

                                if ($stmt = mysqli_prepare($link, $sql_reset)) {
                                    mysqli_stmt_bind_param($stmt, "s", $param_password);

                                    $param_password = password_hash($password_forgot, PASSWORD_DEFAULT);

                                    if (mysqli_stmt_execute($stmt)) {

                                        // Password updated successful
                                        echo '<script type="text/javascript">alert("Password reset is successful. Please login to continue."); </script>';

                                        $show_code = "reset";
                                    } else {
                                        echo "Something went wrong. Please try again later.";
                                    }

                                    // Close statement
                                    mysqli_stmt_close($stmt);
                                }
                            }
                        } else {
                            $code_err_forgot = "Code is invalid. Please enter the code again or clear the code input then submit to send a new code verification.";
                        }
                    }
                }
                // User
                else {
                    $username_err_forgot = "Username and Email doesn't match or exist.";
                }
            } else {
                $username_err_forgot = "Username and Email doesn't match or exist.";
            }
        } else {
            echo "Something went wrong. Please reload or try again later.";
        }

        mysqli_stmt_close($stmt_forgot);
    }
}

// View Movie
else if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["view_movie"]))) {
    $_SESSION["movie_id"] = $_POST["view_id"];
    header("location: movie_profile.php");
}

// Search Direct
else if (($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST["search_button"]))) {
    $temp_search = trim($_POST["search_title"]);
    $test_search = substr($temp_search, -4);
    if (is_numeric($test_search) == 1) {
        $temp_search = substr($temp_search, 0, -4);
    }
    $temp_search = strtoupper($temp_search);
    $sql = "SELECT * FROM movies WHERE MOVIE_TITLE LIKE '%$temp_search%'";
    $res = mysqli_query($link,  $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $temp_row = trim($row['MOVIE_TITLE']);
            $temp_row = strtoupper($temp_row);
            if ($temp_search == $temp_row) {
                $_SESSION["movie_id"] = $row['MOVIE_ID'];
            } else {
                $_SESSION["movie_id"] = $temp_search;
            }
        }
    } else {
        $_SESSION["movie_id"] = 0;
    }
    header("location: movie_profile.php");
}

// Search
if (isset($_REQUEST["search_term"])) {
    $search = $_REQUEST["search_term"];
    $sql = "SELECT * FROM movies WHERE MOVIE_TITLE LIKE '%$search%' LIMIT 5";
    if ($stmt = mysqli_prepare($link, $sql)) {
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $date = substr($row['PREMIERE_DATE'], 0, 4);
                    echo '<p class="row"><img src="../images/movies/poster/' . $row['POSTER'] . '" style="width: 45px; margin-right:0px;"> ';
                    echo '<span class="pt-0 col-8">' . $row["MOVIE_TITLE"] . '<br><span class="text-secondary">' . $date . '</span></span></p>';
                }
            } else {
                echo "<p>No matches found</p>";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    mysqli_stmt_close($stmt);
}
