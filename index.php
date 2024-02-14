<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "netflix";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn)
{
    die("Connecttion failed". mysqli_connect_error());
}

if(isset($_POST["save"]))
{
    $fname= $_POST['fname'];
    $Email= $_POST['Email'];
    $phone= $_POST['phone'];
    $date= $_POST['date'];
    $pass= $_POST['pass'];

    

    $checkUser = "select * from user WHERE Email = '$Email'";
    $result = mysqli_query($conn, $checkUser);
    $count = mysqli_num_rows($result);
    if($count>0){
        echo "Email already used";
        
    }
    else {
        $sql_query = "insert into user (fname, Email, phone, date, pass)  VALUES ('$fname', '$Email', '$phone', '$date', '$pass')";
         if (mysqli_query($conn, $sql_query)) {
             echo "Data inserted Succesfully";
        } else {
            echo "user not added";
      }
    }
    $check = "select * from user WHERE phone = '#$phone'";
    $result = mysqli_query($conn,$check);
    $count = mysqli_num_rows($result);
    if($count> 0){
        echo "Number already in use";    
    } 
    else {
        $sql_query = "insert into user (fname, Email, phone, date, pass)  VALUES ('$fname', '$Email', '$phone', '$date', '$pass')";
         if (mysqli_query($conn, $sql_query)) {
             echo "Data inserted Succesfully";
        } else {
            echo "user not added";
      }
    }
    

    
    mysqli_close($conn);

} 
?>