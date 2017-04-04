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

    <div class="gallery">
        <?php
        if(isset($_POST["searchGallery"])){
            if(($_POST["tag"]!="Select tag")&&($_POST["category"]=="Select category")){
                $tag =$_POST["tag"];
                unset($_SESSION['searchmsg']);
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
                                <img  class='img-thumbnail' style='display: block; height: 200px; width:200px;' src='$imageThumbURL' alt='' />
                            </a>
                            <button class='btn btn-success' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#ocr'> Recognize
                        <i class='fa'></i></button>
                    <button class='btn btn-danger' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#confirm-delete\'> Delete
                    <i class='fa fa-trash-o'></i></button>
                        </div>";

                        if (($count+1)%3==0){
                            echo "</div><div class='row' >";

                        } $count++;
                     }
                }else{
                    $_SESSION['searchmsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> Oops!! No results were found for your search query </div>";
                }
            }

            if(($_POST["tag"]!="Select tag")&&($_POST["category"]!="Select category")){
                $tag =$_POST["tag"];
                unset($_SESSION['searchmsg']);
                $cat =$_POST["category"];
                $usersession = $_SESSION['userSession'];
                $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                $urow = $user->fetch_assoc();
                $userid = $urow['userid'];


                //get images from database
                $query = $conn->query("SELECT image_url FROM receipt where userid = '$userid' 
                AND categoryid='$cat' AND receiptid IN(SELECT receiptid FROM receipt_tag WHERE tagid='$tag')");

                if($query->num_rows > 0) {
                    echo "<div class=' row'>";

                    $count= 0;
                    $imageThumbURL ;
                    while($row = $query->fetch_assoc()){

                        $imageThumbURL = $row["image_url"];
                        $imageURL = $row["image_url"];

                        echo"<div class='col-md-4 col-lg-4 col-xs-12'><a href='$imageURL' style='display:block;' data-fancybox='group' data-caption='' >
                                <img  class='img-thumbnail' style='display: block; height: 200px; width:200px;' src='$imageThumbURL' alt='' />
                            </a>
                            <button class='btn btn-success' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#ocr'> Recognize
                        <i class='fa'></i></button>
                    <button class='btn btn-danger' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#confirm-delete\'> Delete
                    <i class='fa fa-trash-o'></i></button>
                        </div>";

                        if (($count+1)%3==0){
                            echo "</div><div class='row' >";

                        } $count++;
                    }
                }
                else{
                    $_SESSION['searchmsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> Oops!! No results were found for your search query </div>";
                }
            }
        if(($_POST["tag"]=="Select tag")&&($_POST["category"]=="Select category")){
            $_SESSION['searchmsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> Oops!! Buddy you have to select at least one of the search criteria </div>";
        }

            if(($_POST["tag"]=="Select tag")&&($_POST["category"]!="Select category")){
                $cat =$_POST["category"];
                unset($_SESSION['searchmsg']);
                $usersession = $_SESSION['userSession'];
                $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                $urow = $user->fetch_assoc();
                $userid = $urow['userid'];


                //get images from database
                $query = $conn->query("SELECT image_url FROM receipt where userid = '$userid' 
                AND categoryid='$cat'");

                if($query->num_rows > 0) {
                    echo "<div class=' row' >";

                    $count= 0;
                    $imageThumbURL ;
                    while($row = $query->fetch_assoc()){

                        $imageThumbURL = $row["image_url"];
                        $imageURL = $row["image_url"];

                        echo"<div class='col-md-4 col-lg-4 col-xs-12'><a href='$imageURL' style='display:block;' data-fancybox='group' data-caption='' >
                                <img  class='img-thumbnail' style='display: block; height: 200px; width:200px;' src='$imageThumbURL' alt='' />
                            </a>
                            <button class='btn btn-success' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#ocr'> Recognize
                        <i class='fa'></i></button>
                    <button class='btn btn-danger' data-href='<?php echo $imageThumbURL; ?>' data-toggle='modal' data-target='#confirm-delete\'> Delete
                    <i class='fa fa-trash-o'></i></button>
                        </div>";

                        if (($count+1)%3==0){
                            echo "</div><div class='row' >";

                        } $count++;
                    }
                }
                else{
                    $_SESSION['searchmsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> Oops!! No results were found for your search query </div>";
                }
            }
        }?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0');
            if($pageWasRefreshed){
                unset($_SESSION['searchmsg']);

            }
            ?>
            <?php if (isset($_SESSION['searchmsg'])){
                echo $_SESSION['searchmsg'];
                $_SESSION['searchmsg'] = '';


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
    <div id="ocr" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Optical Character Regonition</h4>
                </div>
                <div class="modal-body">
                    <p id="ocr_results"></p>
                    <p id="ocr_status"></p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-times-circle-o "></i></button>

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
        $('#ocr').on('show.bs.modal', function(e) {
            var imageurl = $(e.relatedTarget).data('href');
            runOCR(imageurl);
        });
        $('#ocr').on('hidden.bs.modal', function () {
            document.getElementById("ocr_results")
                .innerText = '';
        });

    });
    function runOCR(url) {
        Tesseract.recognize(url)
            .then(function(result) {
                document.getElementById("ocr_results")
                    .innerText = result.text;

            }).progress(function(result) {
            document.getElementById("ocr_status")
                .innerText = result["status"] + " (" +
                (result["progress"] * 100) + "%)";
        });
    }
</script>
</body>
</html>