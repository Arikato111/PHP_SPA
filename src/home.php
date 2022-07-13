<?php
function Home() { // it has no function's name , It will return to variable when got require

    title('Home');
    return <<<HTML
        <div class="content">
            <!-- Style link  -->
            <link rel="stylesheet" href="/static/home.css">

            <!-- Content  -->
            <div class="box">
                <div class="title">Welcome to <b>PHP_SPA</b> version <span style="background-color: aqua;padding:3px;border-radius: 10px;">Simple</span> </div>
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
                <div style="font-size: 18px;text-align:center;">You will find style.css and script.js in static folder.</div>
                <h4 class="contact">Read more at <a class="hove" target="_blank" href="https://github.com/Arikato111/PHP_SPA/tree/simple">Github</a></h4>
            </div>
        </div>
        HTML;
};
