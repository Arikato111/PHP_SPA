<?php
function GetLearnParams(){
    $value = getParams();

    if(!$value) $value = "emty"; // check emty value

    return title("about | " . $value) 
        . "value is " . $value
        ;
}