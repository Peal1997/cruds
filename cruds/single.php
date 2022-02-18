<?php
include_once "./autoloader.php";
$user_id = $_GET['user_id']?? false;
if($user_id){

	$data = connect() -> query("SELECT * from teachers where id ='$user_id'");
	 $user_data = $data ->fetch_object();
	 if($user_data->name ==''){
		header('location:user.php');
	 }
}else{
	header('location:user.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teachers Info</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
   

</head>

<body>
	

     <div class="single-user">
		 <img src="./photos/<?php echo $user_data->photo;?>" alt="" >
		 <h2><?php echo $user_data->name;?></h2>
		 <h3><?php echo "Email :" . $user_data->email;?></h3>
		 <h3><?php echo "Cell :" . $user_data->salary;?></h3>
	
		 <h3><?php echo "Education :" . $user_data->department;?></h3>
		 <h3><?php echo "Gender :" . $user_data->gender;?></h3>
		 <a class ="btn btn-primary" href="user.php" >Back</a>

	 </div>



	<!-- JS FILES  -->
	<script src ="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	
	<script src="assets/js/scripts.js"></script>
	
</body>
</html>