<?php
$title = import('wisit-router/title');

$Home = function () use ($title) {
  $title('Home'); // use title function to change title
  return <<<HTML
    <div class="content">
      <!-- Style link  -->
      <link rel="stylesheet" href="/public/home.css">

      <!-- Content  -->
      <div>
        <div class="box">
          <div class="triangle"></div>
          <div class="triangle fixed"></div>
        </div>
        <h1 align="center">Welcome to PHP_SPA 3.0</h1>
        <h2 align="center">
          Read more at 
          <a href="https://github.com/Arikato111/PHP_SPA">Github</a>
        </h2>
      </div>
    </div>
    HTML;
};

$export = $Home;