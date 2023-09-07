<!DOCTYPE html>
<html>
<head>
    <title>File Listing</title>
    <style>
        body{
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }
        h1 {
            text-align: center; /* Center-align the header */
        }
    </style>
</head>
<body>
    <h1>File Listing</h1>
    <table>
        <tr>
            <th>File Name</th>
            <th>Size (Bytes)</th>
            <th>Last Modified</th>
        </tr>
        <?php
        $files = scandir(__DIR__);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
                $filePath = __DIR__ . '/' . $file;
                echo '<tr>';
                echo '<td><a href="' . $file . '">' . $file . '</a></td>';
                echo '<td>' . filesize($filePath) . '</td>';
                echo '<td>' . date("Y-m-d H:i:s", filemtime($filePath)) . '</td>';
                echo '</tr>';
            }
        }
        ?>
