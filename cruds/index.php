<?php

include_once "./autoloader.php";


if(isset($_POST['submit'])){
      $name = $_POST['name'];
      $salary = $_POST['salary'];
      $email= $_POST['email'];
      $cell = $_POST['cell'];
      $dpt = $_POST['dpt'];
      $gender = $_POST['gender'] ?? '';
      $file_name = photoupload($_FILES['photo'],'photos/');
      $edu = $_POST['edu'];
      
      

      $email_chk = empty($email) == true ? '<h6 style ="color:red">*requried</h6>' : '';

     if( empty($name) || empty($salary ) || empty($email) || empty($cell) || empty($dpt)){

        $msg = validate('All fields are required');
     }

        else if(emailchk($email)==false){
            $msg = validate('Invalid email address' ,'warning');
        }
    
   
     else{

        connect()  -> query("INSERT INTO teachers (name, salary ,email ,cell,department ,gender,education,photo) VALUES
         ('$name','$salary','$email','$cell','$dpt','$gender' ,'$edu', '$file_name ')");

         $msg = validate('Data stable','success');
         clear();

       }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers account</title>
   <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   

</head>
<body>
    
    <div class="user-form w-25 mx-auto my-5">
    <a class="btn btn-primary" href="./user.php" >All teachers</a>
        <div class="card shadow ">
       
            <div class="card-header">
                <h1 calss ="card-title">Create teachers account</h1>
            </div>
            <div class="card-body">
            <?php  echo $msg ?? ''  ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class = "form-label" for="name">Name </label>
                        <input name="name" type ="text" id ="name" value="<?php echo old('name') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="salary">Salary </label>
                        <input name="salary" type ="text" id ="salary" value="<?php echo old('salary') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="email">Email </label>
                        <input name="email" type ="text" id ="email" value="<?php echo old('email') ?>" class="form-control">
                        <?php echo $email_chk ?? '' ?>
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="cell">Cell </label>
                        <input name="cell" type ="text" id ="cell" value="<?php echo old('cell') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class = "form-label" for="dpt">Department </label>
                        <input name="dpt" type ="text" id ="dpt" value="<?php echo old('dpt') ?>" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Gender</label></label>
                       <input name="gender" type ="radio" id ="Male" value="Male" > <label for="Male">Male </label>
                       <input name="gender" type ="radio" id ="Female" value="Female" > <label  for="Female">Female </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Last certificate</label>
                        <select class ="form-control" name="edu" id="">
                            <option>--Select--</option>
                            <option>Bachelor</option>
                            <option>Masters</option>
                            <option>Phd</option>
                            <option>PGDM</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                       <input name="photo" type ="file" > 
                       
                    </div>
                    <br>
                   
                    <div class="form-group">
                       <input class ="btn btn-primary" name="submit" type ="submit" valeu="submit" > 
                       
                    </div>
                    <div class="card-footer">
                        <h1>It is card footer</h1>
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
