<?php
$title = import('preact/title');
import('./src/app.css');

$App = function () use ($title) {
  $title('Home'); 

  return <<<HTML
    <div class="content">
      <div>
        <div class="box">
          <div class="triangle"></div>
          <div class="triangle fixed"></div>
        </div>
        <h1 align="center">Welcome to Preact</h1>
        <h2>Get started by editing src/App.php</h2>
        <h3 align="center">
          <a 
            target="_blank" 
            href="https://github.com/Arikato111/PHP_SPA/tree/Preact"
            style="
              color:black;
              font-size:24px;
            "
          >Learn Preact</a>
        </h3>
      </div>
    </div>
    HTML;
};

$export = $App;