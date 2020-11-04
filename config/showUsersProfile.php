<?php
include('config.php');

if ($link === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

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
<th>MODIFIED_ON</th>
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
            echo "<td>" . $row['MODIFIED_ON'] . "</td>";
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
mysqli_close($link);
