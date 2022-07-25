<?php
$preact = import('preact');
$App = import('./src/App');

$preact->render(<<<HTML
    <Preact.Component>
        {$App()}
    </Preact.Component>
HTML);

$export = $preact;