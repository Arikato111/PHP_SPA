<?php
return function ($position = -1) {
    $getPath = require('./modules/wisit-router/getPath.php');
    $params = explode('/', substr($getPath(), 1));
    if (!empty($params)) {
        if ($position > -1) {
            if(count($params) -1 < $position) return false;
            return str_replace("%20", " ", $params[$position]);
        }
        return str_replace("%20", " ", $params[sizeof($params) - 1]);
    }
};
