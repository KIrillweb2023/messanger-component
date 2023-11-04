<?php 
session_start();
require_once("../server/connect.php");
require_once("func_chat_get.php");
$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

  if(!empty($message)){
    $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')") or die();
    header("location: ../../index-chat.php");
  }

if(isset($_POST['submit'])) {
  if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) { // Ну тут тип проверка выбран ли файл
    // тут я получаю основную информацию об изображении
    $file = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $type = $_FILES['image']['type'];

    $data = file_get_contents($file); //получаю содержимое файла
    $data = mysqli_real_escape_string($conn, $data); // очищаю данные файла перед сохранением в БД

    $query = "INSERT INTO userfile (name, size, type, data) VALUES ('$name', '$size', '$file', '$data')";

    // Выполняем запрос
    if(mysqli_query($conn, $query)) {
    echo "Image uploaded successfully.";
    } else{
      echo "Error uploading image.";
    }
  } else{
    echo "No image selected.";
  }
}
?>


<!-- ответ за сообщение -->