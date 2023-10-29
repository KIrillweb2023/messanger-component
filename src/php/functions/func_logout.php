<?php
  require ("php/server/connect.php");
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if(!empty($fname) && !empty($email) && !empty($password)){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
          if(mysqli_num_rows($sql) > 0){
              echo "$email - Это электронное письмо уже существует!";
          }else{   
            $time = time();
            $ran_id = rand(time(), 100000000);
            $status = "Active now";
            $encrypt_pass = md5($password);
            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, email, password, status)
            VALUES ({$ran_id}, '{$fname}','{$email}', '{$encrypt_pass}',  '{$status}')");
            if($insert_query){
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    echo '<div class="cucces">Вы успешно зарегистрировались</div>';
                }else{
                    echo '<div class="email_error"> Этот адрес электронной почты не существует!</div>';
                }
            }else{
                echo '<div> class="error_reporting" Что-то пошло не так. Пожалуйста, попробуйте еще раз!</div>';
            }
        }
    }
}
?>

