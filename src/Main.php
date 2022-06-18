<?php
return function () {
    // import module as function by module function 
    ['SwitchPath' => $SwitchPath, 'Route' => $Route] = module('wisit-router');
    // if you don't want to use module function to require modules, You can write as below.
    // ['SwitchPath' => $SwitchPath, 'Route' => $Route] = require('./modules/wisit-router/wisit-router.php');

    $HomePage = require('./src/Home.php'); // require HomePage from Home.php

    // use SwitchPage() | write Route inside SwitchPath and use callback function
    return $SwitchPath(
        $Route('/', fn () => $HomePage()), // using callback to return Page function
        $Route('*', fn () => 'Not found page'), // You can return string as text or HTML code 
    );
}; // <-- don't forgot to write ';'
