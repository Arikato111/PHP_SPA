<?php
return function () {
    session_start(); // <-- you can delete if don't need to use

    // !important | require normal module at here
    require('./modules/module-import/module-import.php'); // module-import from modules to use module function

    // import module as function by module function 
    ['SwitchPath' => $SwitchPath, 'Route' => $Route] = module('wisit-router');
    // if you don't want to use 'module function' to require modules, You can write as below.
    // ['SwitchPath' => $SwitchPath, 'Route' => $Route] = require('./modules/wisit-router/wisit-router.php');

    $HomePage = require('./src/Home.php'); // require Home page from Home.php

    // use SwitchPath() | write Route inside SwitchPath and use callback function
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return $SwitchPath(
        $Route('/', fn () => $HomePage()), // using callback to return Page function
        $Route('*', fn () => 'Not found page'), // You can return string as text or HTML code 
    );
}; // <-- don't forgot to write ';'
