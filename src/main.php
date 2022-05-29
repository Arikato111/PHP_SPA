<?php

function RootContent() {
    // use SwitchPage([]) | write Route inside [] and use callback function
    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return SwitchPath([
        Route('/', fn () => HomePage()),
        Route('*', fn () => 'Not found page'),
    ]);
}
