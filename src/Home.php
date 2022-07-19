<?php
$title = import('wisit-router/title');

$Home = function () use ($title) {
  $title('Home'); // use title function to change title
  return <<<HTML
    <div class="content">
      <!-- Style link  -->
      <link rel="stylesheet" href="/public/home.css">

      <!-- Content  -->
      <div class="box">
        <div class="title">Welcome to PHP_SPA version 3.0 </div>
        <hr>
        <div class="subtitle">Writing code with </div>
        <div class="box-list">
          <ul class="list">
            <li>SwitchPath</li>
            <li>Route </li>
            <li>getParams</li>
            <li>getPath </li>
            <li>title</li>
            <li>import</li>
          </ul>
        </div>
        <div class="subtitle">And most importantly, use 
          <a href="https://github.com/Arikato111/PHP_SPA/tree/Release3.0#import"
          style="text-decoration: none;color:black;"
          target="_blank"
          >
            <b>import</b>
          </a>
          to require file or module</div>
        <div> writing page as function</div>
        <div style="font-size: 18px;">You will find style.css and script.js in static folder.</div>
        <h4 class="contact">Read more at <a class="hove" target="_blank" href="https://github.com/Arikato111/PHP_SPA">Github</a></h4>
      </div>
    </div>
    HTML;
};

export: $Home;
