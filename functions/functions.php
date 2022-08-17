<?php

function clean ($input){
    return addslashes(trim(htmlspecialchars($input)));
}

function validate_username($username,$admin=false)
{
    if(empty($username)){
        return "username can not be empty";
    }elseif(gettype($username) != "string" ){
        return "you must enter valid username";
    }
    if($admin===true)
    {
        if($username!=="admin")
        {
            return"Wrong Username";
        }
    }
    return true;
}
function validate_email ($input){
    if(empty($input)){
        return "email can not be empty";
    }elseif(!filter_var($input,FILTER_VALIDATE_EMAIL)){
        return "you must enter valid mail";
    } 
    return true;
}

function validate_pass ($input,$admin=false){
    if(empty($input)){
        return "password can not be empty";
        }
        if($admin===true)
        {
            if($input!=="admin")
            {
                return"Wrong password";
            }
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

function imagevalidate($image_ext,$image_size)
{
     if (!array_search($image_ext,["png","jpg","jpeg","bmp"]))
     {
    return "your file type is not an image !";
     }
    else if (($image_size/1024)>512)
    {
       return "your image size is over 100 KB !";
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

function connectDB($input="el-hamd"){
    $server= "localhost";
    $user = "root";
    $pass = "";
    $db = $input;
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