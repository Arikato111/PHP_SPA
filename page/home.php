<?php
function HomePage()
{
    return title("Home") .
        <<<HTML
            <h2>this is home page</h2>
            <div>Content</div>
            <div>click "about" to go to about page</div>
        HTML;
}
