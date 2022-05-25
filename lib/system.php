<?php

// func for check path to use switch case
function CheckPath()
{
    $link = "$_SERVER[REQUEST_URI]";
    $param = "";
    $real_string = "/";
    for ($i = 1; $i < strlen($link); $i++) {
        if ($link[$i] == '?') {
            break;
        } else if ($link[$i] == '/') {
            $param = $real_string . '/:';
            $real_string = $real_string . $link[$i];
        } else {
            $real_string = $real_string . $link[$i];
        }
    }
    return ["path" => $real_string, "params" => $param];
}

function Route($path, $callbakFunc){
    $getPath = CheckPath();
    if ($getPath["path"] == $path || $getPath["params"] == $path || $path == "*") {
        return $callbakFunc();
    }
}

function SwitchPath($Route)
{
    foreach ($Route as $value) {
        if ($value) {
            return $value;
        }
    }
}

function getParams()
{
    $link = "$_SERVER[REQUEST_URI]";
    $real_string = "/";
    for ($i = 1; $i < strlen($link); $i++) {
        if ($link[$i] == '?') {
            break;
        } else if ($link[$i] == '/') {
            $real_string = $real_string . $link[$i];
        } else {
            $real_string = $real_string . $link[$i];
        }
    }
    $params = explode('/', $real_string);
    if (!empty($params)) {
        return $params[sizeof($params) - 1];
    }
}

function import($dir)
{
    $getDir = glob($dir);
    if (!empty($getDir)) {
        foreach ($getDir as $file) {
            if (str_contains(substr($file, 1), '.')) {
                require_once("$file");
            } else {
                import("$file/*");
            }
        }
    }
}

function title($title)
{
    return '<script>document.title = "' . $title . '"</script>';
}
