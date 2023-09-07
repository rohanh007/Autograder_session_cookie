
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Fun</title>
    <style>
        /* Center everything on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f7f7;
        }

        /* Styling for the container */
        .container {
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        /* Styling for links */
        a {
            text-decoration: none;
            background-color: #04AA6D;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
        }

        /* Hover effect for links */
        a:hover {
            background-color: #04AA6D;
        }

        /* Styling for the session data display */
        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
            max-width: 600px;
            overflow: auto;
        }

        /* Styling for session ID paragraph */
        p {
            font-size: 18px;
            margin-top: 20px;
        }
        containe {
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        /* Styling for paragraphs */
        p {
            font-size: 18px;
            margin-top: 20px;
        }
        .empty-session {
            background-color: #04AA6D;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-right: 20px;
        }
    </style>
</head>
<body>

     <div class="containe">
     <?php
     session_start();
        // Your PHP logic remains the same
        if (!isset($_SESSION['slices'])) {
            echo'<p class="empty-session">Session is empty</p>';
            $_SESSION['slices'] = 0;
        } else if ($_SESSION['slices'] < 3) {
            $_SESSION['slices'] = $_SESSION['slices'] + 1;
            echo'<p class="empty-session">Added one...</p>';
        } else {
            session_destroy();
            session_start();
            echo'<p class="empty-session">Session Restarted</p>';
        }
        ?>
    </div>
    <div class="container">
        <a href="sessfun.php">Click Me!</a>
        <p>Our Session ID is: <?php echo(session_id()); ?></p>
        <pre><?php print_r($_SESSION); ?></pre>
    </div>
</body>
</html>
