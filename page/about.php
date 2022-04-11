<?php
function AboutPage(){
    return subMitForm('Home', 'home', 'homeid') . '<hr><h2>this is About page</h2><div>Content</div><div>
    click "Home" to go to Home page
    </div>';
}