<?php
function GetLearnParams(){
    $value = getParams();

    
    if(!$value) $value = "emty";

    $head = '<div><a href="/">home</a></div><hr>';
    return title("about | " . $value) 
        . $head
        . "value is " . $value
        ;
}