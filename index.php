<?php 
require('./modules/use-import/main.m.php');
$Main = import('./src/Main');
$Content = $Main(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $GLOBALS['title']; ?></title>
    <link rel="stylesheet" href="/public/style.css">
    <?php $showStyle(); ?>
</head>

<body>
    <div> <?php echo $Content; ?> </div>
    <script src="/public/script.js"></script>
</body>

</html>