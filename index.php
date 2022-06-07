<?php
session_start();
require('./package.php'); // require package
require("./src/Main.php"); // require Main to use Main function and push content to page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <link rel="stylesheet" href="/static/style.css"> 
    <!-- do not use ./style.css or style.css, only use /style.css -->
</head>

<body>
    <div>
        <?php echo Main(); ?>
    </div>
    <script src="/static/script.js"></script>
</body>

</html>