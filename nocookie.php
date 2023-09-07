<?php
// Tell PHP we won't be using cookies for the session
ini_set('session.use_cookies', '0');
ini_set('session.use_only_cookies',0);
ini_set('session.use_trans_sid',1);

session_start();

// Output styling and HTML structure using HEREDOC
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Cookies for You!</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f7f7f7;
        }

        /* Container styles */
        .container {
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        /* Link styles */
        a.button, input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #04AA6D;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            margin: 10px;
            cursor: pointer;
        }

        a.button:hover, input[type="submit"]:hover {
            background-color: ##04AA6D;
        }

        /* Session ID paragraph styles */
        p.session-id {
            font-size: 18px;
            margin-top: 20px;
        }

        /* Session data display styles */
        pre.session-data {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
            max-width: 600px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div class="container">
HTML;

// Your existing PHP logic without changes
if (!isset($_SESSION['value'])) {
    echo("<p class='session-info'>Session is empty</p>");
    $_SESSION['value'] = 0;
} else if ($_SESSION['value'] < 10) {
    $_SESSION['value'] = $_SESSION['value'] + 1;
    echo("<p class='session-info'>Added one \$_SESSION['value'] = " . $_SESSION['value'] . "</p>");
} else {
    session_destroy();
    session_start();
    echo("<p class='session-info'>Session Restarted</p>");
}

// Continue with the HTML structure
echo <<<HTML
        <a href="nocookie.php" class="button">Click Here!</a>
        <form action="nocookie.php" method="post">
            <input type="submit" name="click" value="Submit Button" class="button">
        </form>
        <p class="session-id">Our Session ID is: {session_id()}</p>
    </div>

    <pre class="session-data">
HTML;

// Display session data
print_r($_SESSION);

// Complete the HTML structure
echo <<<HTML
    </pre>
</body>
</html>
HTML;
?>
