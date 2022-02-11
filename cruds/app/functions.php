<?php

include_once "./config.php";



/**
 * databse connection
 */

function connect(){
    return new mysqli(HOST,USER,PASS,DB);
}
function validate($msg , $type='danger')
{
    return "<p class = \"alert alert-{$type}\">
    {$msg} ! <button data-dismiss=\"alert\"
     class=\"btn-close\">&times;</button></p>";
}
function emailcheck($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else{
        return false;
    }
}
function old($key)
{
    return $_POST[$key] ?? '' ;
}
function clear(){
    echo $_POST = '';

}
/**
 * currency converter funtion
 */
$rate = 0;
function checkcurrency($currency , $amount){
   switch($currency){

     case 'USD' :
        $rate = 89.5;
        break;
    case 'CAD' :
        $rate = 64;
        break;
    case 'Euro' :
        $rate = 94;
        break;
    case 'Pound' :
        $rate = 114;
        break;
    case 'Won' :
        $rate = 0.071;
        break;
  }
  $bdt =$rate*$amount;
  return "{$amount} {$currency} = {$bdt} BDT";


} 
function marriage($name ,$dob ,$gender ){
    $age = date('Y') - $dob;
   switch($gender){
       case 'Male' :
        if($gender == 'Male' && $age>= 18){
          return "Hi {$name} vaia, you are ready to be married";
        }
        else {
            return "Hi {$name} vaia, you are not ready to be married";
        }
        break;
       case 'Female' :
        if($gender == 'Female' && $age>= 18){
          return "Hi {$name} apu, you are ready to be married";
        }
        else {
            return "Hi {$name} apu, you are not ready to be married";
        }
        break;
        

   }

}
/**
 * file upload
 */
function photoupload($file_data , $path='/'){

     //file info
     $file_name = $file_data['name'];
     $file_tmp_name = $file_data['tmp_name'];
     move_uploaded_file($file_tmp_name, $path.$file_name);

     return $file_name;

}