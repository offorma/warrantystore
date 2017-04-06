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
if(!isset($_SESSION['userSession'])&& $_SESSION['admin']==false){
    header('location:index.php');

}else{
    echo "<div class=' container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2'>
        <table id ='listrooms' class='table table-condensed table-striped'>
					<thead>
						<tr>
							<th class=>Username</th>
							<th class=>Email</th>
							<th class=></th>
							<th class=></th>
							<th class=></th>
							
						</tr>
					</thead>";


    $query = $conn->query("SELECT username, userid, email, active, admin FROM user");

    while ($row=$query->fetch_assoc()) {
        echo'
    							<td class=>'.$row["username"].'</td>
								<td class=>'.$row["email"].'</td>';
					if ($row["active"]==0){
					echo"<td>
                        <form action='adverify.php' method='post'>
                        <button type='submit' name='activate' class='btn btn-success'>Activate</button>
                        </form></td>";
					}else{
                       echo"<td><button type='submit' name='activate' class='btn btn-success' disabled>Activate</button></td>";
                    }
    }

    echo '</tr></table>';
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
