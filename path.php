<?php
require('./lib/system.php');
require("./package.php");

function RootContent(){
    // use SwitchPage([]) | write Route inside []
    return SwitchPath([
        Route('/about/:', fn ()=> GetLearnParams()),
        Route('/about',fn()=> AboutPage()),
        Route('/',fn()=> HomePage()),
        Route('*',fn()=> HomePage()),
    ]);
}