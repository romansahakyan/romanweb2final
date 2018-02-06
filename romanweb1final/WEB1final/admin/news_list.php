<?php  
$db = mysqli_connect("localhost", "root", "usbw", "rom");
$sql = "SELECT * FROM `products`";
$result = mysqli_query($db, $sql);				
?>

<table border="1">
	<tr>
		<td>id</td>
		<td>name</td>
		<td>update</td>
		<td>delete</td>
	</tr>

	<?php  

	while( $r = mysqli_fetch_assoc($result) ){
	?>
	<table border="1">
		<tr>
			<td><?php echo $r['id']; ?></td>
			<td><?php echo $r['title']; ?></td>
			<td><a href="update.php?id=<?php echo $r['id']; ?>">
					update
				</a>
			</td>
			<td>
				<a href="action.php?action=delete&id=<?php echo $r['id']; ?>">
					delete
				</a>
			</td>
		</tr>
	</table>
	<?php
	}
	?>
</table>