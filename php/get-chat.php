<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if(!empty($row['file_name'])){
                // Construct the correct file path using __DIR__
                $filePath = __DIR__ . "/uploads/" . $row['file_name'];

                // Display file information as the sender's or receiver's message
                $output .= ($row['outgoing_msg_id'] === $outgoing_id) ? 
                    '<div class="chat outgoing">
                        <div class="details">
                            <p><a href="' . $filePath . '" download>' . $row['file_name'] . '</a></p>
                        </div>
                    </div>' :
                    '<div class="chat incoming">
                        <img src="php/images/'.$row['img'].'" alt="">
                        <div class="details">
                            <p><a href="' . $filePath . '" download>' . $row['file_name'] . '</a></p>
                        </div>
                    </div>';
            } else {
                // Display regular messages
                $output .= ($row['outgoing_msg_id'] === $outgoing_id) ? 
                    '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>' :
                    '<div class="chat incoming">
                        <img src="php/images/'.$row['img'].'" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send a message or a file, they will appear here.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}
?>
