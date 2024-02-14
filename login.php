<?php
 $email= $_POST['Email'];
 $pass= $_POST['pass'];


$con = new mysqli('localhost','root','','netflix');
if($con->connect_error)
{
    die("failed to connect :". $con->connect_error);
} else {   
    $stmt=$con->prepare ("select * from user where Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();  
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0)
    {
        $data =$stmt_result->fetch_assoc();
        if($data['pass'] === $pass)
        {
            header('location: index.html');
            

            
        } else {
            echo "<h2>Invalid email or password";
        }

    } else {
        echo "<h2>Invalid Email or Password</h2>";
    }

}
 
?>