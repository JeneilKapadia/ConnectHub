<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    
    // Check if it's a regular message or a file upload
    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        // File upload handling
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];

        $target_dir = "uploads/";  // Specify the target directory
        $target_file = $target_dir . basename($file_name);

        // Move the file to the specified directory
        move_uploaded_file($file_tmp, $target_file);

        // Insert file information into the database
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, file_name, file_type, file_size)
                                    VALUES ({$incoming_id}, {$outgoing_id}, '', '{$file_name}', '{$file_type}', {$file_size})") or die();
    } else {
        // Regular message handling
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }
} else {
    header("location: ../login.php");
}
?>
