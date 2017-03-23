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

<div class="container">
    <div class="gallery">
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
                </a></div>
                <?php
                if (($count+1)%3==0){
                    echo "</div><div class='row' >";

                } $count++;?>
            <?php }
        } ?>
    </div>
</div>
    <script>
        Tesseract.recognize("<?php echo $imageThumbURL; ?>", {
            lang: 'ind',
            tessedit_char_blacklist: 'e'
        })
            .progress(function(message){ console.log(message) })
            .then(function(result) { console.log(result) });
    </script>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>
<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>
</body>
</html>