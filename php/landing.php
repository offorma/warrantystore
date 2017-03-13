<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:33 PM
 */
session_start();
include('header.php');?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 image-form">
                <form class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 center-block " action="upload.php" method="post">
                    <div class="form-group center-block">
                        <input type="file" name="image" id="file" class="inputfile" />
                        <label class="center-block" for="file">Choose an image to upload</label>
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