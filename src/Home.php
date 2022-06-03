<?php
function Home() {
    // use title to change title 
    // and String Concatenation with your content by .
    return title("Home") . 
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
            <img width="300" src="https://camo.githubusercontent.com/435841a5395e69cf7bb7670d9e4505f5c511cf3898da0976d5f96ffd936e096e/68747470733a2f2f766964656f2e66756270312d312e666e612e666263646e2e6e65742f762f7433392e33303830382d362f3238343535313639385f3338343634383237333632363530345f313630393430303730373239343139323137395f6e2e706e673f5f6e635f6361743d313036266363623d312d37265f6e635f7369643d373330653134265f6e635f6f68633d7077446554786c4f73336341585f32766e524a265f6e635f68743d766964656f2e66756270312d312e666e61266f683d30305f415438506a6e4135586f37456d767639496638626551534130776e4b764a306c624d2d4943745030737069434967266f653d3632393544343043" alt="">
            <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
            <h4>Read more at <a target="_blank" href="https://github.com/Arikato111/PHP_SPA">Github</a></h4>
        </div>
        HTML;
}
