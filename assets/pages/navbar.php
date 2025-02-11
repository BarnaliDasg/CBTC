<?php global $user; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white border" style="width:100%;">
    <div class="container-fluid d-flex justify-content-between">
        <div class="d-flex justify-content-between w-75">
            <a class="navbar-brand" href="?">
                <img src="assets/images/cds.png" alt="Logo" style="height:45px;">
            </a>
            <form class="d-flex w-50">
                <input class="form-control" type="search" placeholder="Looking for someone..." aria-label="Search">
            </form>
        </div>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <!-- Home -->
            <li class="nav-item mx-2">
                <a class="nav-link" href="?home" aria-label="Home">
                    <i class="fas fa-home fa-lg"></i>
                </a>
            </li>

            <!-- Add Post Icon -->
             <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Open Modal
            </button>
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
            </button> -->
            <!-- <li class="nav-item mx-2">
                <a class="nav-link" href="#" id="Modal" data-bs-toggle="modal" data-bs-target="#addpost" aria-label="addpost">
                    <i class="fas fa-plus-square fa-lg"></i>
                </a>
            </li> -->

            <!-- Notifications -->
            <li class="nav-item mx-2">
                <a class="nav-link" href="?notifications" aria-label="Notifications">
                    <i class="fas fa-bell fa-lg"></i>
                </a>
            </li>

            <!-- Messages -->
            <li class="nav-item mx-2">
                <a class="nav-link" href="?messages" aria-label="Messages">
                    <i class="fas fa-envelope fa-lg"></i>
                </a>
            </li>

            <!-- Comments -->
            <li class="nav-item mx-2">
                <a class="nav-link" href="?comments" aria-label="Comments">
                    <i class="fas fa-comment-dots fa-lg"></i>
                </a>
            </li>

            <!-- User Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/profile/<?=$user['profile_pic']?>" alt="Profile" height="40" width="40" class="rounded-circle border">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?edit_profile">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="#">Account Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="assets/php/actions.php?logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
