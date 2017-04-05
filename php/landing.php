<?php
require_once 'db.php';
include('header.php');
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:33 PM
 */

if(!isset($_SESSION['userSession'])){
    header('location:index.php');

}?>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-6">
                        <?php $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && ($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0');
                    if($pageWasRefreshed){
                        unset($_SESSION['fileextention']);
                        unset($_SESSION['imgsize']);
                        unset($_SESSION['fileerror']);
                        unset($_SESSION['filesuccess']);
                        unset($_SESSION['emptyInput']);
                        unset($_SESSION['msgstag']);
                        unset($_SESSION['tagsqlmsg']);
                        unset($_SESSION['tagreqmsg']);
                    }
                    ?>
                        <?php if (isset($_SESSION['fileextention'])){
                        echo $_SESSION['fileextention'];
                            unset($_SESSION['fileextention']);
                    } ?>
                        <?php if (isset($_SESSION['imgsize'])){
                        echo $_SESSION['imgsize'];
                            unset($_SESSION['imgsize']);
                    } ?>
                        <?php if (isset($_SESSION['fileerror'])){
                        echo $_SESSION['fileerror'];
                            unset($_SESSION['fileerror']);
                    } ?>
                        <?php
                    if (isset($_SESSION['filesuccess'])){
                        echo $_SESSION['filesuccess'];
                        unset($_SESSION['filesuccess']);
                    } ?>
                        <?php
                    if (isset($_SESSION['emptyInput'])){
                        echo $_SESSION['emptyInput'];
                        unset($_SESSION['emptyInput']);
                    } ?>
                         <?php if (isset($_SESSION['msgstag'])){
                        echo $_SESSION['msgstag'];
                            unset($_SESSION['msgstag']);
                    } ?>
                        <?php
                    if (isset($_SESSION['tagsqlmsg'])){
                        echo $_SESSION['tagsqlmsg'];
                        unset($_SESSION['tagsqlmsg']);
                    } ?>
                        <?php
                    if (isset($_SESSION['tagreqmsg'])){
                        echo $_SESSION['tagreqmsg'];
                        unset($_SESSION['tagreqmsg']);
                    } ?>

                        <?php if (isset($_SESSION['feedmsg'])){
                            echo $_SESSION['feedmsg'];
                            unset($_SESSION['feedmsg']);
                        } ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 image-form">


                        <form class=" form-img center-block " action="uploads.php" method="post" enctype="multipart/form-data">
                            <div class="form-group center-block">
                                <!--!<input type="file" name="image" id="file" class="inputfile" />-->
                                <label class=" btn btn-default btn-file" for="file" style="width: 100%;">
                                    <input type="file" name="image" id="file" style="display: none;"/>
                                Choose an image to upload </label>
                            </div>
                            <div class="form-group">
                                <label for="rnumber">Receipt number</label>
                                <input type="text" class="form-control" id="rnumber" name="rnumber" placeholder="Receipt number">
                            </div>
                            <div class="form-group">
                                <label for="rnumber">Total charge</label>
                                <input type="text" class="form-control" id="tcharge" name="tcharge" placeholder="Total charge">
                            </div>
                            <div class="form-group">
                                <label for="category">Tags</label>
                                <?php
                                $usersession = $_SESSION['userSession'];

                                $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                $urow = $user->fetch_assoc();
                                $userid = $urow['userid'];

                                $sql = "SELECT name, tagid FROM tag where userid = '$userid'";
                                $result = $conn->query($sql);?>
                                <select class="selectpicker form-control" name="tag[]" multiple="multiple">
                                    <?php

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                            echo'<option value="'.$row["tagid"].'" >'.$row["name"].'</option>';
                                        }
                                    }
                                    ?></select>

                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <?php
                                $usersession = $_SESSION['userSession'];

                                $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                $urow = $user->fetch_assoc();
                                $userid = $urow['userid'];

                                $sql = "SELECT name FROM category where userid = '$userid'";
                                $result = $conn->query($sql);?>
                                <select class="selectpicker form-control" name="category">
                                <?php

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo'<option >'.$row["name"].'</option>';
                                    }
                                }
                                ?></select>

                            </div>
                                <button type="submit" name ="file-btn" class="btn btn-default center-block">Upload</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1">
                        <div>
                            <form  class="form-img" action="createtag.php" method="post">
                                <div class="form-group">
                                    <label for="tag">Tag Name</label>
                                    <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter a tag name">
                                </div>
                                <button type="submit" name ="createtag-btn" class="btn btn-default center-block">Create Tag</button>
                            </form>

                        </div>
                        <div>
                            <form class="form-img" action="createcat.php" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter a category name">
                                </div>
                                <button type="submit" name ="createcat-btn" class="btn btn-default center-block">Create Category</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        </body>
        </html>