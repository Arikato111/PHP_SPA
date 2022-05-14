<?php
require("./package.php");

function RootContent(){
    // set page //
    switch(CheckPath()){ // check path
        case "/about": 
            return AboutPage();
        case '/':
            return HomePage();
        default: 
        header('location: /'); // if not found page redirect to path '/'
    }
}


// func for check path to use switch case
function CheckPath(){
    $link = "$_SERVER[REQUEST_URI]";
    $real_string ="";
    for($i=0;$i < strlen($link);$i++){
        if($link[$i] == '?'){
         break;
        } else {
            $real_string = $real_string . $link[$i];
        }
    }    
    return $real_string;
}
