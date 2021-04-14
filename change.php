<?php
require_once 'db.php';

 // $_POST['val'];
 // $_POST['user_id'];

 $query=mysqli_query($con,"UPDATE user SET status='".$_POST['val']."' WHERE id='".$_POST['user_id']."'");

if($query){
	$q=mysqli_query($con,"SELECT * FROM user WHERE id='".$_POST['user_id']."'");
	$row=mysqli_fetch_assoc($q);
	echo $row['status'];
}

?>