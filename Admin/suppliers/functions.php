<?php

function clean ($input){
    return addslashes(trim(htmlspecialchars($input)));
}

function validate_email ($input){
    if(empty($input)){
        return "email can not be empty";
    }elseif(!filter_var($input,FILTER_VALIDATE_EMAIL)){
        return "you must enter valid mail";
    }
    return true;
}

function validate_pass ($input){
    if(empty($input)){
        return "password can not be empty";
    }else if(strlen($input) < 6){
        return "password can't be less than 6 charcter";
    }
    return true;
}

function validate_text ($input, $input_validate){
    if(empty($input)){
        return "$input_validate can not be empty";
    }elseif(gettype($input) != "string" ){
        return "you must enter valid $input_validate";
    }
    return true;
}

function validate_image ($ext, $size, $error){
    if($error != 0){
        return " Your image has an error";
    }elseif(!in_array($ext,['jpg','png','jpeg'])){
        return "you must enter valid image with extension png, jpg or jpeg";
    } elseif (($size/(1024*1024))> 2){
        return "your image must not exceed 2 MB";
    }
    return true;
}

function check_error($errors){
    foreach($errors as $error){
        if(gettype($error)== "string" || $error ===false){
            return false;
        }
    }
    return true;
}

function connectDB(){
    $server= "localhost";
    $user = "root";
    $pass = "";
    $db = "el-hamd";
    $connect = mysqli_connect($server,$user,$pass,$db);
    if(!$connect){
        return mysqli_connect_error();
    }
    return $connect;
}

function query($connection,$query)
{
    $con=mysqli_query($connection,$query);
    $result=[];
    while($row=mysqli_fetch_assoc($con))
    {
        foreach($row as $key)
        {
            array_push($result,$key);
            break;
        }
    }
    return $result;
}