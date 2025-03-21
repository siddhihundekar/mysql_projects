<?php include ("layouts/header.php"); ?>
<style>
    .col-4{
        text-align:center;
        border:1px solid black;
        border-radius:7px;
        background-color: ghostwhite;
        padding-top:1.2em;
        padding-bottom:1.2em;
    }
    h2{
        /* text-align:center; */
        margin-bottom:0.5em;
        color:  rgb(59, 59, 116);
        cursor: pointer;
    }
    h2 .fa{
        margin-right: 0.5em;
    }
</style>

<h1 style="text-align:center;margin:1em; cursor: pointer;">Welcome to College Management</h1>

<div class="container-fluid">
    <div class="d-flex">
        <div class="col-4 m-3">
            <h2><u>Courses</u></h2>
            <p>Number of Courses</p>
            <h4>4</h4>
        </div>
        <div class="col-4 m-3">
            <h2><u>Teachers</u></h2>
            <p>Number of Teachers</p>
            <h4>4</h4>
        </div>
        <div class="col-4 m-3">
            <h2><u>Students</u></h2>
            <p>Number of Students</p>
            <h4>4</h4>
        </div>
    </div>
</div>

<?php include ("layouts/footer.php"); ?>