
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
            }?>

        </ul>
        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
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

