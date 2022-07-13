<?php
function getPath(): string
{
    $link = "$_SERVER[REQUEST_URI]";
    $path = "/";
    $str_len = strlen($link);
    for ($i = 1; $i < $str_len; $i++) {
        if ($link[$i] == '?') {
            break;
        } else {
            $path = $path . $link[$i];
        }
    }
    return $path;
}

function Route(string $path, callable $callBackFunc): callable | null
{
    if ($path == '*') return $callBackFunc;
    $getPath = explode('/', getPath());
    $Route_path = explode('/', $path);

    if (sizeof($getPath) != sizeof($Route_path)) return null;
    for ($i = 0; $i < sizeof($Route_path); $i++) {
        if ($getPath[$i] != $Route_path[$i] && $Route_path[$i] != ':') return null;
    }
    return $callBackFunc;
}

function SwitchPath(...$Route): string | null
{
    foreach ($Route as $value) {
        if ($value) {
            $content = $value();
            if ($content) return $content;
        }
    }
}
function getParams(int $position = -1): string
{
    $params = explode('/', substr(getPath(), 1));
    if (!empty($params)) {
        if ($position > -1) {
            return str_replace("%20", " ", $params[$position]);
        }
        return str_replace("%20", " ", $params[sizeof($params) - 1]);
    }
}

function title(string $title): void {
    if (isset($GLOBALS['title'])) {
        $GLOBALS['title'] = $title;
    } else {
        echo '<script>alert("$GLOBAL[\'title\'] is not set")</script>';
    }
}