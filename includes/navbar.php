<?php ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <img src="../images/NGL_white_logo.png" width="70" height="40" alt="E-learning" id="logo_nav" />
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_dashboard.php">Home</a>
                </li>
            </ul>
        </div>
        <div id="nav_user" class="dropdown">
            <button onclick="myFunction()" class="dropbtn bg-dark">Dropdown</button>
            <a href="javascript:myFunction();">
                <svg class="dropbtn bg-dark" xmlns="http://www.w3.org/2000/svg" width="70" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg></a>
            <div id="myDropdown" class="dropdown-content">
                <a href="#">Profile</a>
                <a href="../login.php">Logout</a>
            </div>
        </div>
    </div>
</nav>