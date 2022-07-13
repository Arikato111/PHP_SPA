<?php
function Main() {
    session_start(); // <-- you can delete if don't need to use

    // !important | require normal module at here

    // import module as function by module function 
    // if you don't want to use 'module function' to require modules, You can write as below.
    // ['SwitchPath' => $SwitchPath, 'Route' => $Route] = require('./modules/wisit-router/wisit-router.php');


    // use SwitchPath() | write Route inside SwitchPath and use callback function
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return SwitchPath(
        Route('/', fn()=> Home()),
    );
}; // <-- don't forgot to write ';'
