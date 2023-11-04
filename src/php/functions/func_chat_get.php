<?php 
    session_start();
        require_once("../server/connect.php");
        if(!$conn){
            echo "Database connection error".mysqli_connect_error();
        }
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
                OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id') ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="messanges-text">
                                    <div class="messange">'. $row['msg'] . '<span class="date">' . date_create($row['data_time'])->Format('H:i') . '</span></div>
                                </div>';         
                }
            }
        }else{
            $output .= '<div class="not-messange-text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
?>

<!-- сообщение пользователей  -->