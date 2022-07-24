<?php
$title = import('wisit-router/title');
import('./src/home.css');

$Home = function () use ($title) {
  $title('Home'); // use title function to change title
  return <<<HTML
    <div class="content">
      <div>
        <div class="box">
          <div class="triangle"></div>
          <div class="triangle fixed"></div>
        </div>
        <h1 align="center">Welcome to PHP_SPA 3.0</h1>
        <h2>Get started by editing src/Home.php</h2>
        <h3 align="center">
          Read more at 
          <a target="_blank" href="https://github.com/Arikato111/PHP_SPA">Github</a>
        </h3>
      </div>
    </div>
    HTML;
};

$export = $Home;