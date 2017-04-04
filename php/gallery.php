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
<?php
if(!isset($_SESSION['userSession'])){
header('location:index.php');

}?>
<?php include('header.php') ?>
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
                        <option>Select tag</option>
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
                        <option>Select category</option>
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
        <div class="col-md-6 col-md-offset-3">
        <?php if (isset($_SESSION['filesmsg'])){
            echo $_SESSION['filesmsg'];
            unset($_SESSION['filesmsg']);
        } ?>
        <?php if (isset($_SESSION['filesuc'])){
            echo $_SESSION['filesuc'];
            unset($_SESSION['filesuc']);
        } ?></div>
        <?php
        $usersession = $_SESSION['userSession'];
        $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
        $urow = $user->fetch_assoc();
        $userid = $urow['userid'];


        //get images from database
        $query = $conn->query("SELECT image_url FROM receipt where userid = '$userid'");

        if($query->num_rows > 0){
            ?><div class=" row">
            <?php
            $count= 0;
            $imageThumbURL ;
            while($row = $query->fetch_assoc()){

                $imageThumbURL = $row["image_url"];
                $imageURL = $row["image_url"];
                ?>
                <div class="col-md-4 col-lg-4 col-xs-12"><a href="<?php echo $imageURL; ?>" style="display:block;" data-fancybox="group" data-caption="<?php ?>" >
                    <img  class="img-thumbnail" style="display: block; height: 200px; width:200px;" src="<?php echo $imageThumbURL; ?>" alt="" />
                </a>
                <button class="btn btn-success">Recognize</button>
                    <button class="btn btn-danger" data-href="<?php echo $imageThumbURL; ?>" data-toggle="modal" data-target="#confirm-delete"> Delete
                    <i class="fa fa-trash-o"></i></button>
                </div>
                <?php
                if (($count+1)%3==0){
                    echo "</div><div class='row' >";

                } $count++;?>
            <?php }
        } ?>
    </div>
</div>
    <div id="confirm-delete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure that you want to delete this image</p>
                    <p class="text-warning"><small>If you click "delete" your data will be lost permanently</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-times-circle-o "></i></button>
                    <form class="mod" action="delete.php"method="post">
                        <input class="hiden" type="hidden" name="url" value="">
                        <button type="submit" class="btn btn-danger btn-ok" name="btn-ok" value="">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>
<script>

    $(document).ready(function(){
        $("[data-fancybox]").fancybox({ });
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var imageurl = $(e.relatedTarget).data('href');
            $('.hiden').attr('value', imageurl);
        });

    });
</script>

</body>
</html>