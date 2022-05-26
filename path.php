<?php
require('./lib/system.php');
require("./package.php");

function RootContent(){
    // use SwitchPage([]) | write Route inside [] || and use callback function
    return
    headerSub() . // use headerSub function outside switch to show on all page
     SwitchPath([
        Route('/about/:', fn ()=> GetLearnParams()),
        Route('/about',fn()=> AboutPage()),
        Route('/',fn()=> HomePage()),
        Route('*',fn()=> 'Not found page'),
    ]);
}