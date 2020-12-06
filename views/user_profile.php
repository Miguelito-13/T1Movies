<div class="container custom-users-profile">
    <div class="row">
        <div class="col-md-12">
            <p>NAME: <span><?php echo $row['FIRST_NAME']." ".$row['MI'];" ".$row['LAST_NAME']; ?></span></p>
            <p>ADDRESS: <span><?php echo htmlspecialchars($_SESSION["ADDRESS"]); ?></span></p>
            <p>CONTACT NO.: <span><?php echo htmlspecialchars($_SESSION["CONTACT_NO"]); ?></span></p>
        </div>
        <div class="col-md-8">
            <p>BIRTH DATE: <span><?php echo htmlspecialchars($_SESSION["BIRTHDATE"]); ?></span></p>
        </div>
        <div class="col-md-4">
            <p>SEX: <span><?php echo htmlspecialchars($_SESSION["GENDER_ID"]); ?></span></p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <p>USERNAME: <span><?php echo htmlspecialchars($_SESSION["USERNAME"]); ?></span></p>
            <p>EMAIL ADDRESS: <span><?php echo htmlspecialchars($_SESSION["EMAIL"]); ?></span></p>
        </div>
    </div>
    <hr/>
    <div class="col-12 d-flex justify-content-start">
        <a href="edit_profile.php" class="btn custom-edit-btn p-auto">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg> Edit Profile
        </a>
    </div>
</div>