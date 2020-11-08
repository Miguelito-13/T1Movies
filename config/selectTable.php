<?php
$q = intval($_GET['q']);

require_once "config.php";

// cinema
if ($q == 1) {
    $sql = "SELECT * FROM cinema";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>CINEMA_ID</th>
<th>MORNING_TIME</th>
<th>NOON_TIME</th>
<th>AFTERNOON_TIME</th>
<th>EVENING_TIME</th>
<th>NO_SEATS</th>
<th>IMAX</th>
<th>DIRECTORS_CUT</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['CINEMA_ID'] . "</td>";
                echo "<td>" . $row['MORNING_TIME'] . "</td>";
                echo "<td>" . $row['NOON_TIME'] . "</td>";
                echo "<td>" . $row['AFTERNOON_TIME'] . "</td>";
                echo "<td>" . $row['EVENING_TIME'] . "</td>";
                echo "<td>" . $row['NO_SEATS'] . "</td>";
                echo "<td>" . $row['IMAX'] . "</td>";
                echo "<td>" . $row['DIRECTORS_CUT'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// gender
else if ($q == 2) {
    $sql = "SELECT * FROM gender";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>GENDER_ID</th>
<th>GENDER</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['GENDER_ID'] . "</td>";
                echo "<td>" . $row['GENDER'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// genre
else if ($q == 3) {
    $sql = "SELECT * FROM genre";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>GENRE_ID</th>
<th>GENRE_NAME</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['GENRE_ID'] . "</td>";
                echo "<td>" . $row['GENRE_NAME'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// movies
else if ($q == 4) {
    $sql = "SELECT * FROM movies";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>MOVIE_ID</th>
<th>MOVIE_TITLE</th>
<th>PREMIERE_DATE</th>
<th>MOVIE_DURATION</th>
<th>MOVIE_DESC</th>
<th>RATED</th>
<th>RATING</th>
<th>POSTER</th>
<th>SHOWING_IN_IMAX</th>
<th>SHOWING_IN_DIRECTORS_CUT</th>
<th>CREATED_ON</th>
<th>CREATED_BY</th>
<th>MODIFIED_ON</th>
<th>MODIFIED_BY</th>
<th>ACTIVE</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['MOVIE_ID'] . "</td>";
                echo "<td>" . $row['MOVIE_TITLE'] . "</td>";
                echo "<td>" . $row['PREMIERE_DATE'] . "</td>";
                echo "<td>" . $row['MOVIE_DURATION'] . "</td>";
                echo "<td>" . $row['MOVIE_DESC'] . "</td>";
                echo "<td>" . $row['RATED'] . "</td>";
                echo "<td>" . $row['RATING'] . "</td>";
                echo "<td>" . $row['POSTER'] . "</td>";
                echo "<td>" . $row['SHOWING_IN_IMAX'] . "</td>";
                echo "<td>" . $row['SHOWING_IN_DIRECTORS_CUT'] . "</td>";
                echo "<td>" . $row['CREATED_ON'] . "</td>";
                echo "<td>" . $row['CREATED_BY'] . "</td>";
                echo "<td>" . $row['MODIFIED_ON'] . "</td>";
                echo "<td>" . $row['MODIFIED_BY'] . "</td>";
                echo "<td>" . $row['ACTIVE'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// movie_branches
else if ($q == 5) {
    $sql = "SELECT * FROM movie_branches";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>BRANCH_ID</th>
<th>BRANCH_NAME</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['BRANCH_ID'] . "</td>";
                echo "<td>" . $row['BRANCH_NAME'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// movie_category
else if ($q == 6) {
    $sql = "SELECT * FROM movie_category";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>CATEGORY_ID</th>
<th>MOVIE_ID</th>
<th>GENRE_ID</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['CATEGORY_ID'] . "</td>";
                echo "<td>" . $row['MOVIE_ID'] . "</td>";
                echo "<td>" . $row['GENRE_ID'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// now_showing
else if ($q == 7) {
    $sql = "SELECT * FROM now_showing";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>NOW_ID</th>
<th>MOVIE_ID</th>
<th>CINEMA_ID</th>
<th>BRANCH_ID</th>
<th>ACTIVE</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['NOW_ID'] . "</td>";
                echo "<td>" . $row['MOVIE_ID'] . "</td>";
                echo "<td>" . $row['CINEMA_ID'] . "</td>";
                echo "<td>" . $row['BRANCH_ID'] . "</td>";
                echo "<td>" . $row['ACTIVE'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// receipt
else if ($q == 8) {
    $sql = "SELECT * FROM receipt";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>RECEIPT_ID</th>
<th>RESERVE_ID</th>
<th>PAID</th>
<th>PAID_ON</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['RECEIPT_ID'] . "</td>";
                echo "<td>" . $row['RESERVE_ID'] . "</td>";
                echo "<td>" . $row['PAID'] . "</td>";
                echo "<td>" . $row['PAID_ON'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// reservation
else if ($q == 9) {
    $sql = "SELECT * FROM reservation";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>RESERVE_ID</th>
<th>ACCOUNT_ID</th>
<th>NOW_ID</th>
<th>SEAT_ROW</th>
<th>SEAT_NUMBER</th>
<th>VIEWING_ID</th>
<th>DATE_OF_VIEWING</th>
<th>DATE_CREATED</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['RESERVE_ID'] . "</td>";
                echo "<td>" . $row['ACCOUNT_ID'] . "</td>";
                echo "<td>" . $row['NOW_ID'] . "</td>";
                echo "<td>" . $row['SEAT_ROW'] . "</td>";
                echo "<td>" . $row['SEAT_NUMBER'] . "</td>";
                echo "<td>" . $row['VIEWING_ID'] . "</td>";
                echo "<td>" . $row['DATE_OF_VIEWING'] . "</td>";
                echo "<td>" . $row['DATE_CREATED'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// tickets
else if ($q == 10) {
    $sql = "SELECT * FROM tickets";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>TICKET_ID</th>
<th>RECEIPT_ID</th>
<th>COMPLETED</th>
<th>COMPLETED_ON</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['TICKET_ID'] . "</td>";
                echo "<td>" . $row['RECEIPT_ID'] . "</td>";
                echo "<td>" . $row['COMPLETED'] . "</td>";
                echo "<td>" . $row['COMPLETED_ON'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// users_account
else if ($q == 11) {
    $sql = "SELECT * FROM users_account";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>ACCOUNT_ID</th>
<th>USERNAME</th>
<th>EMAIL</th>
<th>ACCOUNT_PASSWORD (HASHED)</th>
<th>ADMIN</th>
<th>ACTIVE</th>
<th>VERIFY_CODE</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['ACCOUNT_ID'] . "</td>";
                echo "<td>" . $row['USERNAME'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td>" . $row['ACCOUNT_PASSWORD'] . "</td>";
                echo "<td>" . $row['ADMIN'] . "</td>";
                echo "<td>" . $row['ACTIVE'] . "</td>";
                echo "<td>" . $row['VERIFY_CODE'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// users_profile
else if ($q == 12) {
    $sql = "SELECT * FROM users_profile";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>USERS_ID</th>
<th>ACCOUNT_ID</th>
<th>FIRST_NAME</th>
<th>LAST_NAME</th>
<th>MI</th>
<th>CONTACT_NO</th>
<th>ADDRESS</th>
<th>GENDER_ID</th>
<th>AGE</th>
<th>BIRTHDATE</th>
<th>CREATED_ON</th>
<th>CREATED_BY</th>
<th>MODIFIED_ON</th>
<th>MODIFIED_BY</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['USERS_ID'] . "</td>";
                echo "<td>" . $row['ACCOUNT_ID'] . "</td>";
                echo "<td>" . $row['FIRST_NAME'] . "</td>";
                echo "<td>" . $row['LAST_NAME'] . "</td>";
                echo "<td>" . $row['MI'] . "</td>";
                echo "<td>" . $row['CONTACT_NO'] . "</td>";
                echo "<td>" . $row['ADDRESS'] . "</td>";
                echo "<td>" . $row['GENDER_ID'] . "</td>";
                echo "<td>" . $row['AGE'] . "</td>";
                echo "<td>" . $row['BIRTHDATE'] . "</td>";
                echo "<td>" . $row['CREATED_ON'] . "</td>";
                echo "<td>" . $row['CREATED_BY'] . "</td>";
                echo "<td>" . $row['MODIFIED_ON'] . "</td>";
                echo "<td>" . $row['MODIFIED_BY'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

// viewing_time
else if ($q == 13) {
    $sql = "SELECT * FROM viewing_time";
    if ($res = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
<tr>
<th>VIEWING_ID</th>
<th>VIEW_TIME</th>
</tr>";
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['VIEWING_ID'] . "</td>";
                echo "<td>" . $row['VIEW_TIME'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($res);
        } else {
            echo "No matching records are found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. "
            . mysqli_error($link);
    }
}

mysqli_close($link);
