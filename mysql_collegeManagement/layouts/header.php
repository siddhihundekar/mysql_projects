<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>College Management</title>
</head>
<body>
<style>
    .sidebar{
        border-right: 1px solid rgb(59, 59, 116);
        padding-right: 0.7em;
        /* width: 14em; */
        height:45em;
    }
    .sidebar-brand h6{
        padding-bottom:1em;
        border-bottom:1px solid  rgb(59, 59, 116);;
    }
    .sidebar-brand h6 .fa{
        margin-left:0.2em;
        margin-right:0.5em;
    }
    .sidebar-nav li{
        list-style-type: none;
    }
    .sidebar-nav li a{
        font-size:1.3em;
        color:black;
    }
    .sidebar-nav li .fa{
        margin-right:0.7em;
        color:rgb(59, 59, 116);
    }
</style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="sidebar">
                    <br>
                    <div class="sidebar-header">
                        <div class="sidebar-brand"><h6><span class="fa fa-list"></span>COLLEGE MANAGEMENT</h6></div>
                    </div>
                    <br>
                    <br>
                    <ul class="sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <span class="fa fa-th-large"></span>Dashboard
                        </a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            <span class="fa fa-home"></span>Home
                        </a> -->
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="course.php">
                            <span class="fa fa-book"></span>Courses
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="teacher.php">
                            <span class="fa fa-user"></span>Teachers
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="student.php">
                            <span class="fa fa-graduation-cap"></span>Students
                        </a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="fa fa-cog"></span>Settings
                        </a>
                        </li> -->
                    </ul>
                    <!-- <div class="sidebar-footer d-flex">
                        <button class="sidebar-toggler" type="button"></button>
                    </div> -->
                </div>
            </div>
            <div class="col-9">

          