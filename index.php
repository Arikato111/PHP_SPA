<?php
session_start();
// Don't Delete
// this require for use at all page
require('./modules/module-import/module-import.php'); // module-import from modules to use module function
$Main = require('./src/Main.php'); // Main Page function | require from Main.php
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
        <?php echo $Main(); ?>
    </div>
    <script src="/static/script.js"></script>
    <!-- do not use ./script.js or script.js, only use /script.js -->

</body>

</html>