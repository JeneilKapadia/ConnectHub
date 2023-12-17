<?php
// database connection details
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "fileuploaddownload";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle search query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = !empty($search) ? " WHERE filename LIKE '%$search%'" : '';

// Fetch the uploaded files from the database with the search condition
$sql = "SELECT * FROM files" . $search_condition;
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploaded files</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color: white;
        }

        .container {
            color: black;
        }

        .cta {
            border: none;
            background: none;
            position: absolute;
            top:2.5%;
            left: 20%;
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
            top: -30px;
            right: 20px;
            box-shadow: inset 0 2px 4px 0 rgba(2, 6, 23, 0.3), inset 0 -2px 4px 0 rgba(203, 213, 225);
        }
    </style>
</head>
<body>

<!-- Background Video -->
<video autoplay loop muted class="bg-video">
    <source src="bgvideo.mp4" type="video/mp4">
</video>

<div class="container mt-5">
    <h2>Uploaded Files</h2>

    <!-- Add search bar -->
    <form action="" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search by file name" name="search"
                   value="<?= htmlentities($search) ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>File Name</th>
            <th>File Size</th>
            <th>File Type</th>
            <th>Download</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Display the uploaded files and download links
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file_path = "uploads/" . $row['filename'];
                ?>
                <tr>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['filesize']; ?> bytes</td>
                    <td><?php echo $row['filetype']; ?></td>
                    <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">No files uploaded yet.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <!-- Button Section -->
    <a href="fupload.php">
    <button class="cta">
        <span class="hover-underline-animation"> Upload </span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
            <path transform="translate(30)"
                  d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10"
                  id="Path_10"></path>
        </svg>
    </button></a>
    
    <a href="index.html">
    <button class="custom-button inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
        Home
    </button></a>
</div>
</body>
</html>

<?php
$conn->close();
?>
