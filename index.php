<?php $GLOBALS['title'] = 'title';
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
    <link rel="stylesheet" href="/public/style.css"> <!-- do not use ./style.css or style.css, only use /style.css -->
</head>

<body>
    <div> <?php echo $Content; ?> </div>
    <script src="/public/script.js"></script> <!-- do not use ./script.js or script.js, only use /script.js -->
</body>

</html>