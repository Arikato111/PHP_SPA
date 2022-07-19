<?php
$title = import('/wisit-router/title');

$Home = function () use ($title) { 
    $title('Home'); // use title function to change title
    return <<<HTML
        <div class="content">
            <!-- Style link  -->
            <link rel="stylesheet" href="/static/home.css">

            <!-- Content  -->
            <div class="box">
                <div class="title">Welcome to PHP_SPA version 2.1 </div>
                <hr>
                <div class="subtitle">Writing code with </div>
                <div class="box-list">
                    <ul class="list">
                        <li>SwitchPath</li>
                        <li>Route </li>
                        <li>getParams</li>
                        <li>getPath </li>
                        <li>title</li>
                    </ul>
                </div>
                <div class="subtitle">And most importantly, writing page as function</div>
                <div>You can use module function to require module by input the only name's module, it has return module</div>
                <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
                <h4 class="contact">Read more at <a class="hove" target="_blank" href="https://github.com/Arikato111/PHP_SPA">Github</a></h4>
            </div>
        </div>
        HTML;
};

export: $Home;