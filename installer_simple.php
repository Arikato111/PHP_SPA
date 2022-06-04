<?php
ini_set('user_agent', '3lcieh2bon3032a');
$json =  file_get_contents("https://api.github.com/repos/Arikato111/PHP_SPA/git/trees/simple?recursive=1");
$jo = json_decode($json);

$tree = $jo->tree;

foreach($tree as $value){
    if($value->mode == "100644"){
        $file = file_get_contents('https://raw.githubusercontent.com/Arikato111/PHP_SPA/simple/' . $value->path);
        file_put_contents($value->path, $file);
    } else if($value->mode == "040000"){
        mkdir($value->path);
    } else {
        echo "Not know mode";
        exit;
    }
}

header("Location: /");