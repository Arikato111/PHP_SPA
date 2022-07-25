<?php
session_start(); // <-- you can delete if don't need to use
['SwitchPath' => $SwitchPath, 'Route' => $Route] = import('wisit-router');
$HomePage = import('./src/Home');

$Main = function () use ($SwitchPath, $Route, $HomePage) {
    return $SwitchPath(
        $Route('/', fn () => $HomePage()), // using callback to return Page function
        $Route('*', fn () => 'Not found page'), // You can return string as text or HTML code 
    );
}; // <-- don't forgot to write ';'

$export = $Main;