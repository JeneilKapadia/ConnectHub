<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      margin: 0;
      overflow: hidden;
    }

    .video-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    #background-video {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }

    .wrapper {
      position: relative;
      z-index: 1;
      padding: 20px;
      box-sizing: border-box;
    }

    .form {
      background: rgba(255, 255, 255, 0.8); 
      padding: 20px;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="video-container">
    <video autoplay muted loop id="background-video">
      <source src="bgvideo.mp4" type="video/mp4">
    </video>
  </div>

  <div class="wrapper">
    <section class="form login">
      <header>Chat & Connect</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="chatreg.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
</body>
</html>