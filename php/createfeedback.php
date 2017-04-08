<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/8/17
 * Time: 9:33 AM
 */
require_once 'db.php';
?>
<?php include('header.php') ?>
<?php
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('index.php');

}

$toemail=$_POST['email'];

?>
    <div class="container">
            <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 ">
                            <form  action ="sendmail.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="email1" name="email" value="warrantystoresafe@gmail.com" >
                                </div>
                                <div class="form-group">
                                    <label for="toemail">To</label>
                                    <input type="email" class="form-control" id="toemail1" disabled name="toemail" value='<?php echo"$toemail"?>' >
                                </div>
                                <div class="form-group">
                                    <label for="details">Feedback</label>
                                    <textarea class="form-control" id="details" disabled name="details" ><?php echo"{$_POST['details']}"?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="reply">Reply</label>
                                    <textarea class="form-control" id="reply" name="reply" placeholder="Enter reply text here"required></textarea>
                                </div>
                                <button type="submit" name ="send" class="btn btn-default">Send</button>
                            </form>
                    </div>
            </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<SCRIPT src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></SCRIPT>



</body>
</html>