<?php
require_once 'db.php';
$query=mysqli_query($con,"SELECT * FROM user") ;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Active_Inactive_Ajax</title>
</head>
<body>
	<center>
		<?php
         
         if(mysqli_num_rows($query)>0){
       ?>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
		<th>City</th>
		<th>Current Status</th>
		<th>Change Status</th>
	</tr>
	<?php while($row=mysqli_fetch_assoc($query)){?>
	<tr>
		<td><?php echo $row['id'];?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['city'];?></td>
		<td><?php 

         if($row['status']==1){
         	echo "<p id=sts".$row['id']." style='color:green;'>Active</p>";
         }else {
            echo "<p id=sts".$row['id']." style='color:red;'>Inactive</p>";
         }

		?></td>
		<td>
			<select onchange="active_inactive_user(this.value,<?php echo $row['id'];?>)">
				<option value="">Select</option>
				<option value="1">Active</option>
				<option value="0">Inactive</option>
			</select>
		</td>
		
	</tr>
<?php }?>
</table>
<?php }else{echo "Data not empty";}?>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	function active_inactive_user(val,user_id){
          // alert(val+"    "+user_id);
     $.ajax({
          	type:'post',
          	url:'change.php',
          	data:{val:val,user_id:user_id},
          	success:function(result) {

          		if(result==1){
                     $('#sts'+user_id).html('Active').css('color','green');
          		}else{
                    $('#sts'+user_id).html('Inactive').css('color','red');

          		}
          		
          	}
          })
	}
</script>
</body>
</html>

