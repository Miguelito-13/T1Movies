<?php

session_start();

// Check user login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ./index.php");
    exit;
}

// Check user or admin
if ($_SESSION["user_type"] !== 'ADMIN') {
    header("location: ./index.php");
    exit;
}

include("header.php");

?>

<body>
    <!-- ?php echo htmlspecialchars($_SESSION["username"]); ? -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom sticky-top">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./config/logout.php">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right position-fixed bg-light" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Database</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Movies</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Users</a>
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <div id="sidebar-wrapper">
            <div class="list-group list-group-flush">
            </div>
        </div>
        <!-- Temporary sidebar wrapper for page content below. Try removing to see result -->
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-light pl-3" id="page-content-wrapper">
            <div class="container-fluid">
                <h1 class="mt-4">Simple Sidebar</h1>
                <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio aperiam odit placeat eaque dolorem voluptate tempore illo facilis iste, assumenda sit temporibus quaerat architecto velit veniam suscipit possimus nisi voluptatibus nesciunt non necessitatibus est? Distinctio voluptas, praesentium officiis neque exercitationem nobis. Doloribus mollitia, praesentium excepturi animi nam dolores odio nobis ducimus, explicabo nisi, nemo corporis commodi! Rem voluptas aliquam eos recusandae in eius! Officia laboriosam qui perspiciatis eos! Inventore facilis soluta voluptates officiis nobis, accusamus ex maxime quae molestiae consequatur veritatis excepturi a ut vitae corrupti ducimus culpa explicabo itaque, reprehenderit, cumque tenetur debitis harum sint laborum! Cumque, laboriosam?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio aperiam odit placeat eaque dolorem voluptate tempore illo facilis iste, assumenda sit temporibus quaerat architecto velit veniam suscipit possimus nisi voluptatibus nesciunt non necessitatibus est? Distinctio voluptas, praesentium officiis neque exercitationem nobis. Doloribus mollitia, praesentium excepturi animi nam dolores odio nobis ducimus, explicabo nisi, nemo corporis commodi! Rem voluptas aliquam eos recusandae in eius! Officia laboriosam qui perspiciatis eos! Inventore facilis soluta voluptates officiis nobis, accusamus ex maxime quae molestiae consequatur veritatis excepturi a ut vitae corrupti ducimus culpa explicabo itaque, reprehenderit, cumque tenetur debitis harum sint laborum! Cumque, laboriosam?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio aperiam odit placeat eaque dolorem voluptate tempore illo facilis iste, assumenda sit temporibus quaerat architecto velit veniam suscipit possimus nisi voluptatibus nesciunt non necessitatibus est? Distinctio voluptas, praesentium officiis neque exercitationem nobis. Doloribus mollitia, praesentium excepturi animi nam dolores odio nobis ducimus, explicabo nisi, nemo corporis commodi! Rem voluptas aliquam eos recusandae in eius! Officia laboriosam qui perspiciatis eos! Inventore facilis soluta voluptates officiis nobis, accusamus ex maxime quae molestiae consequatur veritatis excepturi a ut vitae corrupti ducimus culpa explicabo itaque, reprehenderit, cumque tenetur debitis harum sint laborum! Cumque, laboriosam?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores distinctio aperiam odit placeat eaque dolorem voluptate tempore illo facilis iste, assumenda sit temporibus quaerat architecto velit veniam suscipit possimus nisi voluptatibus nesciunt non necessitatibus est? Distinctio voluptas, praesentium officiis neque exercitationem nobis. Doloribus mollitia, praesentium excepturi animi nam dolores odio nobis ducimus, explicabo nisi, nemo corporis commodi! Rem voluptas aliquam eos recusandae in eius! Officia laboriosam qui perspiciatis eos! Inventore facilis soluta voluptates officiis nobis, accusamus ex maxime quae molestiae consequatur veritatis excepturi a ut vitae corrupti ducimus culpa explicabo itaque, reprehenderit, cumque tenetur debitis harum sint laborum! Cumque, laboriosam?</p>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>