<?php


include_once "./autoloader.php";

$edit_id = $_GET['edit_id'] ?? false;
if($edit_id){
    $data = connect() -> query("SELECT * from  teachers where id= '$edit_id' ");
    $edit_user_data = $data -> fetch_object();

    if($edit_user_data -> name == ''){
        header('location:user.php');
    }



}else{
    header('location:user.php');
}


if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $salary = $_POST['salary'];
      $email= $_POST['email'];
      $cell = $_POST['cell'];
      $dpt = $_POST['dpt'];
      $gender = $_POST['gender'] ?? '';
     // $file_name = photoupload($_FILES['photo'],'photos/');

      $updated_at_time = date('Y-m-d H:i:s');
      
      

      $email_chk = empty($email) == true ? '<span style ="color:red">*requried</span>' : '';

     if( empty($name) || empty($salary ) || empty($email) || empty($cell) || empty($dpt)){

        $msg = validate('All fields are required');
     }

        else if(emailchk($email)==false){
            $msg = validate('Invalid email address' ,'warning');
        }
    
   
     else{

           if(!empty($_FILES['new_photo']['name'])){
               
            $update_photo =photoupload($_FILES['new_photo'],'photos');
           }else{
            $update_photo = $edit_user_data -> photo;
           }
           connect() -> query("UPDATE teachers SET name ='$name' ,salary ='$salary',email ='$email',cell ='$cell',department ='$dpt',gender ='$gender' , photo='$update_photo', updated_at ='$updated_at_time ' WHERE id ='$edit_id ' ");
            
           $msg = validate('Data-update succesfull ' ,'warning');

           $data = connect() -> query("SELECT * from  teachers where id= '$edit_id' ");
           $edit_user_data = $data -> fetch_object();
       }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $edit_user_data -> name; ?></title>
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   

</head>
<body>
    
    <div class="user-form w-25 mx-auto my-5">
    <a class="btn btn-primary" href="./user.php" >All teachers</a>
        <div class="card shadow ">
       
            <div class="card-header">
                <h2 calss ="card-title">update <?php echo $edit_user_data -> name; ?>'s data</h2>
            </div>
            <div class="card-body">
            <?php  echo $msg ?? ''  ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class = "form-label" for="name">Name </label>
                        <input name="name" type ="text" id ="name" value="<?php echo $edit_user_data -> name; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="salary">Salary </label>
                        <input name="salary" type ="text" id ="salary" value="<?php echo $edit_user_data ->salary ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="email">Email </label>
                        <input name="email" type ="text" id ="email" value="<?php echo $edit_user_data -> email; ?>" class="form-control">
                        <?php echo $email_chk ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="cell">Cell </label>
                        <input name="cell" type ="text" id ="cell" value="<?php echo $edit_user_data -> cell; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="dpt">Department </label>
                        <input name="dpt" type ="text" id ="dpt" value="<?php echo $edit_user_data -> department; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for ="">Gender</label>
                       <input <?php echo $edit_user_data -> gender == 'Male' ? 'checked' : ''; ?>  name="gender" type ="radio" id ="Male" value="Male" > <label for="Male">Male </label>
                       <input <?php echo $edit_user_data -> gender == 'Female' ? 'checked' : ''; ?> name="gender" type ="radio" id ="Female" value="Female"> <label  for="Female">Female </label>
                    </div>
                    <div class="form-group">
                        <label for="">Last certificate</label>
                        <select class ="form-control" name="edu" id="">
                            <option <?php echo $edit_user_data -> education == '' ? 'selected' : ''; ?> >--Select--</option>
                            <option <?php echo $edit_user_data -> education == 'Bachelor' ? 'selected' : ''; ?> >Bachelor</option>
                            <option <?php echo $edit_user_data -> education == 'Masters' ? 'selected' : ''; ?> >Masters</option>
                            <option <?php echo $edit_user_data -> education == 'Phd' ? 'selected' : ''; ?> >Phd</option>
                            <option <?php echo $edit_user_data -> education == 'PGDM' ? 'selected' : ''; ?> >PGDM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <img style="width:100%" src = "photos/<?php echo $edit_user_data -> photo; ?>" alt ="">

                       <input name="new_photo" type ="file" > 
                       
                    </div>
                    <br>
                   
                    <div class="form-group">
                       <input class ="btn btn-primary" name="submit" type ="submit" value="Update now" > 
                       
                    </div>
                </form>
            </div>
        </div>

    </div>
    
</body>
<!-- bootstrape 5 Bundle with Popper -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src ="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
