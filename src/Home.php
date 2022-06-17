<?php
return function () {
    ['title' => $title] = module('wisit-router'); // import module as function

    // if want to show Header in all page , can write Header outside SwitchPath 
    // and String Concatenation with SwitchPath by .
    return $title("Home") . 
        <<<HTML
        <div style="text-align: center;margin-top:10px;">
            <div style="font-size:30px;">Welcome to PHP Single page </div>
            <div style="font-size:20px">Writing code with </div>
            <div style="display: inline-block;text-align: left;">
                <ul style="list-style-type: square;">
                    <li>SwitchPath</li>
                    <li>Route </li>
                    <li>getParams</li>
                    <li>getPath </li>
                    <li>title</li>
                </ul>
            </div>
            <div style="font-size: 24px;">And most importantly, writing page as function</div>
            <div>You can use module function to require module by input the only name's module, it has return module</div>
            <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
            <h4>Read more at <a target="_blank" href="https://github.com/Arikato111/PHP_SPA">Github</a></h4>
        </div>
        HTML;
};
