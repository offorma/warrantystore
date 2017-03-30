<?php

session_start();
include 'db.php';
include('header.php');
?>


<div>
                            <form class="search" action="search.php" method="post">

                                    <label for="search">Search by Tag Name</label>
                                    <input type="text" class="form-control" id="search" name="tag" placeholder="Enter a Tag name">

                                <button type="submit" name ="search-btn" class="btn btn-default center-block"> Search </button>
                            </form>
                        </div>

<?
include 'db.php';






// search by tag name




if(isset($_POST["tag"])) {

    $tag = $_POST["tag"];


    $get_tagid = $conn->query("SELECT tagid FROM tag WHERE name like '%$tag%'");

    $urow = $get_tagid->fetch_assoc();
    $tagid = $urow['tagid'];
//echo $tagid;
    $get_receiptid = $conn->query("SELECT receiptid FROM receipt_tag WHERE tagid= '$tagid'");

    $receiptids = array();
    $count=0;
    while($urow = $get_receiptid->fetch_assoc()){
// add each row returned into an array
        $receiptids[] = $urow;
        $count++;
    }
    $imageThumbURL;
    for($i=0;$i<$count; $i++) {
        $recieptid = $receiptids[$i]["receiptid"];

        //get image
        $get_receiptimg = $conn->query("SELECT image_url FROM receipt WHERE recieptid= '$recieptid'");

      echo $get_receiptimg;
     //  $urow = $get_receiptimg->fetch_assoc();
        $image_url = $urow['image_url'];

?>
        <div class="col-md-4 col-lg-4 col-xs-12"><a href="<?php echo $image_url; ?>" style="display:block;" data-fancybox="group" data-caption="<?php ?>" >
                    <img  class="img-thumbnail" style="display: block; height: 200px; width:200px;" src="<?php echo $imageThumbURL; ?>" alt="" />
                </a></div>
<?
    }


}
