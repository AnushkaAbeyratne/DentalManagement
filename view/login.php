<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        input:focus{
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 2px solid black;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 1em;">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"  style="height: 100vh; padding-left: 6em;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height: 17vh;">
                <?php
                    if(isset($_GET["msg"]))
                    {
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?php
                                $msg=$_REQUEST["msg"];
                                $msg=  base64_decode($msg);
                                echo $msg;
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-sm-12">
                        <div id="alertmsg"></div>
                    </div>
            </div>
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 1em;">
                <div class="card-body">
                    <form action="../controller/loginController.php?status=login" method="post" id="loginform">
                        <br>
                        <div class="imgcontainer" style="align-items: center;">
                            <img src="../images/login.jpg" height="100px" width="100px" alt="Avatar" class="avatar" style="margin: auto; display: block;" >
                        </div>
                        <div class="container">
                            <label for="username"><b>Username</b></label><br>
                            <input type="text"  class="form-control" placeholder="Enter Username" id="username" name="username" required style="border-top: none; border-left: none; border-right: none; border-bottom: 2px solid rgb(102, 204, 255);">
                            <br>
                            <label for="password"><b>Password</b></label><br>
                            <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required style="border-top: none; border-left: none; border-right: none; border-bottom: 2px solid rgb(102, 204, 255);">
                            <br>
                            <br>
                            <button type="submit" class="btn btn-block font-weight-bold" style="border-radius: 1em; background-color: rgb(0, 153, 255); color: white;">LOGIN</button>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="height: 100vh; background: url('../images/background1.jpg') center; background-size: contain; background-repeat: no-repeat;"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/validation.js"></script>
</body>
</html>