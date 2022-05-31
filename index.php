<?php
mkdir('modules');
mkdir('src');
mkdir('static');

 $package = [
     [
         "file_name"=>"modules/LICENSE",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/modules/LICENSE",
     ],
     [
         "file_name"=>"modules/wisit-single-page.php",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/modules/wisit-single-page.php",
     ],
     [
         "file_name"=>"src/home.php",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/src/home.php",
     ],
     [
         "file_name"=>"src/main.php",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/src/main.php",
     ],
     [
         "file_name"=>"static/script.js",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/static/script.js",
     ],
     [
         "file_name"=>"src/style.css",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/static/style.css",
     ],
     [
         "file_name"=>".htaccess",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/.htaccess",
     ],
     [
         "file_name"=>"package.php",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/package.php",
     ],
     [
         "file_name"=>"index.php",
         "file_link"=>"https://raw.githubusercontent.com/Arikato111/PHP_SPA/Release/index.php",
     ]
];

foreach($package as $file){
    $module  = file_get_contents($file['file_link']);
    file_put_contents($file['file_name'], $module);
}
