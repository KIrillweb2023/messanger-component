<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "php/server/connect.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: php/layout/login.php");
            }
        }else{
            header("location: index-chat.php");
        }
    }else{  
        header("location: php/layout/logout.php");
    }
?>