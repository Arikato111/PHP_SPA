```
$module  =  file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/installer/index.php');
file_put_contents('index.php', $module);
header('Location: /');
```
