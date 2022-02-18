<?php
include_once "./autoloader.php";

$delete_id = $_GET['delete_id'] ?? false;
connect() -> query("DELETE from  teachers where id='$delete_id'  ");
header('loction:user.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teachers Info</title>
	
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
</head>
<body>
	<div class="wrap-table  shadow">
    <a class="btn btn-primary btn-sm" href="./index.php">add new teachers</a>
        <br>
        <br>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table style="margin:20px" class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Salary</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Department</th>
							<th>Gender</th>
							<th>Education</th>
							<th>photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                 <?php
                    $data = connect() -> query("SELECT  * from teachers" );
            
                    $sn =1;
                    while($user = $data -> fetch_object() ):
                    ?>
                        <tr>
							<td><?php echo $sn++ ; ?></td>
							<td><?php echo $user -> name; ?></td>  
							<td><?php echo $user -> salary; ?></td>
							<td><?php echo $user -> email ; ?></td>
							<td><?php echo $user -> cell ; ?></td>
							<td><?php echo $user -> department ; ?></td>
							<td><?php echo $user -> gender; ?></td>
							<td><?php echo $user -> education; ?></td>
							<td><img style="width:100px" src="photos/<?php echo $user -> photo ; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="./single.php?user_id=<?php echo $user -> id; ?>">View</a>
								<a class="btn btn-sm btn-warning" href="./edit.php?edit_id=<?php echo $user -> id; ?>">Edit</a>
								<a class="btn btn-sm btn-danger delete_btn" href="?delete_id=<?php echo $user -> id; ?>">Delete</a>
							</td>
						</tr>
                        <?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- JS FILES  -->
	<script src ="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	
	<script src="assets/js/scripts.js"></script>
	<script>
		$('.delete_btn').click(function(){
            
          let conf =  confirm('Are you sure ??');
		  if(conf){
			  return true;
		  }else{
			  return false;
		  }
		});
	</script>
</body>
</html>