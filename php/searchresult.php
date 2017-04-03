<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/21/17
 * Time: 9:51 AM
 */
session_start();
require_once 'db.php';
?>
<?php include('header.php') ?>
<?php
if(!isset($_SESSION['userSession'])){
    header('location:index.php');

}?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 gsearch">

            <form class ="form-inline" action="searchresult.php" method="post">
                <div class="form-group col-md-4">

                    <?php
                    $usersession = $_SESSION['userSession'];

                    $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                    $urow = $user->fetch_assoc();
                    $userid = $urow['userid'];

                    $sql = "SELECT name, tagid FROM tag where userid = '$userid'";
                    $result = $conn->query($sql);?>
                    <select class="selectpicker form-control" name="tag" id="tag">
                        <option disabled>Select tag</option>
                        <?php

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo'<option value="'.$row["tagid"].'" >'.$row["name"].'</option>';
                            }
                        }
                        ?></select>

                </div>
                <div class="form-group col-md-4">
                    <?php
                    $usersession = $_SESSION['userSession'];

                    $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                    $urow = $user->fetch_assoc();
                    $userid = $urow['userid'];

                    $sql = "SELECT name, categoryid FROM category where userid = '$userid'";
                    $result = $conn->query($sql);?>
                    <select class="selectpicker form-control" name="category" id="category">
                        <option disabled>Select category</option>
                        <?php

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                                echo'<option value="'.$row["categoryid"].'">'.$row["name"].'</option>';
                            }
                        }
                        ?></select>

                </div>
                    <button type="submit" name ="searchGallery" class="btn btn-default">Search</button>
            </form>
        </div>
    </div>

</div>
<div class="container">

    <div class="gallery">
        <?php
        if(isset($_POST["searchGallery"])){
            if(($_POST["tag"]!=null)&&($_POST["category"]==null)){
                $tag =$_POST["tag"];
                $usersession = $_SESSION['userSession'];
                $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                $urow = $user->fetch_assoc();
                $userid = $urow['userid'];


                //get images from database
                $query = $conn->query("SELECT image_url FROM receipt where userid = '$userid' 
                AND receiptid IN(SELECT receiptid FROM receipt_tag WHERE tagid='$tag')");

                if($query->num_rows > 0) {
                    echo "<div class=' row'>";


                    $count= 0;
                    $imageThumbURL ;
                    while($row = $query->fetch_assoc()){

                    $imageThumbURL = $row["image_url"];
                    $imageURL = $row["image_url"];

                       echo"<div class='col-md-4 col-lg-4 col-xs-12'><a href='$imageURL' style='display:block;' data-fancybox='group' data-caption='' >
                                <img  class='img-thumbnail' style='display: block; height: 200px; width:200px;' src='' $imageThumbURL' alt='' />
                            </a>
                            <button class='btn btn-success'>Recognize</button>
                            <button class='btn btn-success'>Delete</button>
                        </div>";

                        if (($count+1)%3==0){
                            echo "</div><div class='row' >";

                        } $count++;
                     }
                }
            }
        }?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>
<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>
</body>
</html>