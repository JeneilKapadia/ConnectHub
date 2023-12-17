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

    .cta {
      border: none;
      background: none;
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
    }

    .cta span {
      padding-bottom: 7px;
      letter-spacing: 4px;
      font-size: 14px;
      padding-right: 15px;
      text-transform: uppercase;
    }

    .cta svg {
      transform: translateX(-8px);
      transition: all 0.3s ease;
    }

    .cta:hover svg {
      transform: translateX(0);
    }

    .cta:active svg {
      transform: scale(0.9);
    }

    .hover-underline-animation {
      position: relative;
      color: black;
      padding-bottom: 20px;
    }

    .hover-underline-animation:after {
      content: "";
      position: absolute;
      width: 100%;
      transform: scaleX(0);
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #000000;
      transform-origin: bottom right;
      transition: transform 0.25s ease-out;
    }

    .cta:hover .hover-underline-animation:after {
      transform: scaleX(1);
      transform-origin: bottom left;
    }
    .custom-button {
            position: fixed;
            top: 20px;
            right: 20px;
            box-shadow: inset 0 2px 4px 0 rgba(2, 6, 23, 0.3), inset 0 -2px 4px 0 rgba(203, 213, 225);
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
    <section class="form signup">
      <header>Chat & Connect</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>

      <!-- Button Section -->
      <a href="forum.php">
      <button class="cta">
        <span class="hover-underline-animation">Forum</span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
          <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
        </svg>
      </button></a>

      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>
  <a href="index.html">
  <button class="custom-button inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
        Home
    </button></a>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
</body>
</html>
