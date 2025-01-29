<?php 
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if(!empty($username)){
        if(!empty($password)){
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="ict";

            $conn = new msqli($host,$dbusername,$dbpassword,$dbname);
            if(mysqli_connect_error()){
                die('Connect error ('.mysqli_connect_errno().')'.mysqli_connect_error());
            }else{
                $sql = 
            }
        }
    }else{
        echo "User should not be empty";
        die();
    }
?>