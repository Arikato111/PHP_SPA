<?php
require('./lib/system.php');
require("./package.php");

function RootContent(){
    return SwitchPath([
        Route('/about/:', fn ()=> getParams()),
        Route('/about',fn()=> AboutPage()),
        Route('/',fn()=> HomePage()),
        Route('*',fn()=> HomePage()),
    ]);
}