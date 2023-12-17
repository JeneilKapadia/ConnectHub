<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>File upload and download</title>

    <style>
        /* Add styles for the video container */
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        h2 {
            color: black;
        }
        .form-label {
            color: black;
        }

        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .bg-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
        }

        .cta {
            border: none;
            background: none;
            position: absolute;
            bottom: 100px;
            left: 10%;
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

<!-- Background Video -->
<video autoplay loop muted class="bg-video">
    <source src="bgvideo.mp4" type="video/mp4">
</video>

<div class="container mt-5 content">
    <h2>Upload a file</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Select file</label>
            <input type="file" class="form-control" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Upload file</button>
    </form>

    <!-- Button Section -->
    <a href="download.php">
    <button class="cta">
        <span class="hover-underline-animation">Download</span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
            <path transform="translate(30)"
                  d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10"
                  id="Path_10"></path>
        </svg>
    </button></a>
</div>
<a href="index.html">
<button class="custom-button inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
        Home
    </button></a>

</body>
</html>
