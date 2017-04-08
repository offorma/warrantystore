<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/6/17
 * Time: 3:26 PM
 */
require_once 'db.php';
?>
<?php include('header.php') ?>
<?php
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');

}
else{
    echo "<div class=' container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2'>";?>
    <?php if (isset($_SESSION['verifymsg'])){
        echo $_SESSION['verifymsg'];
        unset($_SESSION['verifymsg']);
    } ?>
    <?php echo"
        <table id ='listrooms' class='table table-condensed table-striped'>
					<thead>
						<tr>
							<th class=>Username</th>
							<th class=>Email</th>
							<th class=>Feedback</th>
							<th class=></th>
						</tr>
					</thead>";

    $feed = $conn->query("SELECT feedbackid, details, userid FROM feedback");



    $query = $conn->query("SELECT username, userid, email, active, admin FROM user");

    while ($back=$feed->fetch_array()) {

        $details =$back['details'];
        $uid =$back['userid'];
        $feedbackid =$back['feedbackid'];

        $query = $conn->query("SELECT username, email FROM user Where userid ='$uid'");
        $row=$query->fetch_array();
        $email=$row["email"];
        $username=$row["username"];
        echo'
    							<td class=>'.$row["username"].'</td>
								<td class=>'.$row["email"].'</td>
                                 <td class=>'.$details.'</td>';

            echo"<td>
                                    <form action='sendmail.php' method='post'>
                                    <input type='hidden' name= 'uid' value='$uid'>
                                    <input type='hidden' name= 'uid' value='$username'>
                                    <input type='hidden' name= 'details' value='$details'>
                                    <input type='hidden' name= 'feedbackid' value='$feedbackid'>
                                    <input type='hidden' name= 'email' value='$email'>
                                    <button type='submit' name='make' value='make' class='btn btn-success'>Reply</button>
                                    </form></td></tr>";

    }

    echo '</table>';
}?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<SCRIPT src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></SCRIPT>

<script type="text/javascript">
    $(document).ready(function() {
        $('#listrooms').DataTable();
    } );
</script>

</body>
</html>
