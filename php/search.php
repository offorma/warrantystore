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
    echo $tag;

    $get_tagid = $conn->query("SELECT tagid FROM tag WHERE name like '%$tag%'");

    $urow = $get_tagid->fetch_assoc();
    $tagid = $urow['tagid'];
//echo $tagid;
    $get_receiptid = $conn->query("SELECT receiptid FROM receipt_tag WHERE tagid= '$tagid'");

    $receiptid = array();

    while($urow = $conn->fetch_assoc($get_receiptid)){

        $receiptid[] = $urow;
    }

echo $receiptid[1];




}
