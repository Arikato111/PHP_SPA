<?php
// require at here to use at all page
//you have to start path with outermost dir ex: ./src/Header.php

function Main() {
    // use SwitchPage([]) | write Route inside []
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return SwitchPath([
        Route('/', './src/Home'), // Route need path and directory of page function
        Route('*', './src/NotFound'),
    ]);
}
