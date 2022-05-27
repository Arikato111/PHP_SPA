<?php
function GetLearnParams(){
    $value = getParams();

    if(!$value) $value = "emty"; // check emty value

    return title("About | $value") . 
    <<<HTML
        <h1>value = $value</h1>
    HTML;
}