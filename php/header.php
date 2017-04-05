
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../views/css/style.css">
</head>
<body>

<div id="confirm-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Feedback Form</h4>
            </div>
            <div class="modal-body">
                <form method ="post" action="createmodule">
                    <div class="form-group">
                        <label for="user">Username</label> <input
                                type="text" class="form-control" name="user" value="username" disabled></input>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label> <input
                                type="text" class="form-control" name="message" id=""></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-times-circle-o "></i></button>
                        <button type="button" class="btn btn-danger btn-ok">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">WarrantySafe</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">What is it?</a></li>
            <li><a href="#">Who are we?</a></li>
            <?php
            if (isset($_SESSION['userSession'])) {
                echo' <li><a href="gallery.php">Gallery</a></li>';
                echo' <li><a href="landing.php">Upload</a></li>';
                echo' <li><a href=".php" data-toggle="modal" data-target="#confirm-delete">Feedback</a></li>';

            }?>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION['userSession'])) {
            echo'<li><p class="navbar-text"> Welcome ' .$_SESSION['userSession'].'</p>
            <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>';
            }
            else{
            echo'<li><a href="loginpg.php"><span class="glyphicon glyphicon-user"></span> Sign Up / Login</a></li>';
            };
            ?>
        </ul>
        </div>
    </div>
</nav>

