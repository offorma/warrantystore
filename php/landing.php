<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:33 PM
 */

require_once 'db.php';
include('header.php');?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 image-form">
                <?php if (isset($_SESSION['imgtext'])){
                    echo $_SESSION['imgtext'];
                } ?>
                <?php if (isset($_SESSION['imgsize'])){
                    echo $_SESSION['imgsize'];
                } ?>
                <?php if (isset($_SESSION['imgsuccess'])){
                    echo $_SESSION['imgsuccess'];
                } ?>

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
                        <label for="category">Category</label>
                        <?php

                        $sql = "SELECT name FROM category";
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
        </div>
     </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>