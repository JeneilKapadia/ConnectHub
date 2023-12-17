<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
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

    .users {
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
    }

    .content {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logout {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      background-color: #ddd;
    }

    .search {
      margin-top: 20px;
      display: flex;
      align-items: center;
    }

    .search input {
      flex: 1;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .search button {
      margin-left: 8px;
      padding: 8px;
      border-radius: 5px;
      border: 1px solid #ccc;
      cursor: pointer;
      background-color: #ddd;
    }

    .users-list {
      margin-top: 20px;
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
    <section class="users">
      <header class="content">
        <?php 
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }
        ?>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
</body>
</html>