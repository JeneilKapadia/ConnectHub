<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <style>
        /* Add styles for the video container */
        #background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .cta {
            position: absolute;
            top: 20px;
            left: 20px;
            border: none;
            background: none;
            z-index: 2;
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
    <video autoplay loop muted id="background-video">
        <source src="bgvideo.mp4" type="video/mp4">
    </video>

    <!-- Button -->
    <a href="chatreg.php">
    <button class="cta">
        <span class="hover-underline-animation">Chat & Connect</span>
        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
        </svg>
    </button></a>

    <!-- Modal -->
    <div id="ReplyModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reply Question</h4>
                </div>
                <div class="modal-body">
                    <form name="frm1" method="post">
                        <input type="hidden" id="Rcommentid" name="Rcommentid">
                        <div class="form-group">
                            <label for="usr">Write your name:</label>
                            <input type="text" class="form-control" name="Rname" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Write your reply:</label>
                            <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                        </div>
                        <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="container">

        <div class="panel panel-default" style="margin-top:50px">
            <div class="panel-body">
                <h3>Community forum</h3>
                <hr>
                <form name="frm" method="post">
                    <input type="hidden" id="Pcommentid" name="Pcommentid" value="0">
                    <div class="form-group">
                        <label for="usr">Write your name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="comment">Write your question:</label>
                        <textarea class="form-control" rows="5" name="msg" required></textarea>
                    </div>
                    <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
                </form>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <h4>Recent questions</h4>
                <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                    <tbody id="record">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <a href="index.html">
    <button class="custom-button inline-flex cursor-pointer items-center gap-1 rounded border border-slate-300 bg-gradient-to-b from-slate-50 to-slate-200 px-4 py-2 font-semibold hover:opacity-90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-slate-300 focus-visible:ring-offset-2 active:opacity-100">
        Home
    </button></a>

</body>

</html>
