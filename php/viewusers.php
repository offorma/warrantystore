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


    $query = $conn->query("SELECT username, email, active, admin FROM user");
    $row=$query->fetch_assoc();

    foreach ($row as $user){
            echo'<tr>
								<td class=>'.$user["username"].'</td>
								<td class=>'.$user["email"].'</td>
								<td class=></td>
							    <td class=></td>
							    <td class=></td></tr>
            
            
            ';
    }
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
