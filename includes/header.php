<?php
include "../commons/session.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../resources/datatable/datatables.min.css"/>

</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
        <img src="../images/round%20dental.png" alt="Logo" style="width:40px;">
    </a>
    <a class="navbar-brand" href="#">MY DENTAL CLINIC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-item ml-auto">
        <ul class="navbar-nav" style="align-items: center;">
<!--            <li class="nav-item" style="padding-right: 1em;" >-->
<!--                <a href="#" style="color: black; text-decoration: none; font-size: 1.5em;"><i class="fa fa-bell"></i>&nbsp;<span class="badge badge-notify" style="background-color: darkgrey; border-radius: 50%;">2</span></a>-->
<!--            </li>-->
            <li class="nav-item">
                <img src="../images/user_image/<?php echo $_SESSION["user"]["image"]?>" width="40px" height="40px" alt="Logo" class="rounded-circle" alt="profile-pic">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION["user"]["firstName"]." ".$_SESSION["user"]["lastName"];?>
                </a>
                <div class="dropdown-content dropdown-menu dropdown-menu-right ">
                    <a class="dropdown-item" href="../controller/loginController.php?status=logout">LOGOUT</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
