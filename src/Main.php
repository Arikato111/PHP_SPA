<?php
// require at here to use at all page
//you have to start path with outermost dir ex: ./src/Header.php

function Main() {
    // use SwitchPage() | write Array inside 
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return SwitchPath(
        // with faster version you must input array 
        // in array must has path and directory 
        ['/', './src/Home'], 
        ['*', './src/notFound'],
    );
}
