<?php
// New cookie variable name
$cookieName = 'my_cookie';

// Check if the cookie is set, and if not, set it
if (!isset($_COOKIE[$cookieName])) {
    setcookie($cookieName, '42', time() + 3600);
}

// Check if the page needs to be refreshed
if (isset($_GET['refresh']) && $_GET['refresh'] === 'true') {
    header("Refresh:0; url=cookie.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS for styling */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 50px 100px;
        }

        a {
            text-decoration: none;
            background-color:#04AA6D;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #04AA6D;
        }
    </style>
</head>
<body>
    <pre>
    <?php print_r($_COOKIE); ?>
    </pre>
    <p><a href="cookie.php">Click Me!</a> or <a href="?refresh=true">Refresh</a></p>
</body>
</html>
