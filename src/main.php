<?php
return function () {
    // import module as function
    ['SwitchPath' => $SwitchPath, 'Route' => $Route] = module('wisit-router');
    $HomePage = require('./src/Home.php'); // require HomePage

    // use SwitchPage([]) | write Route inside [] and use callback function
    return $SwitchPath(
        $Route('/', fn () => $HomePage()),
        $Route('*', fn () => 'Not found page'),
    );
};
