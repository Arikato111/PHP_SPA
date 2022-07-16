<?php
function Main() {
    session_start(); // <-- you can delete if don't need to use

    // use SwitchPath() | write Route inside SwitchPath and use callback function
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return SwitchPath(
        Route('/', fn()=> Home()),
    );
}; // <-- don't forgot to write ';'
