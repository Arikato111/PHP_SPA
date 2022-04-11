<?php
function HomePage()
{
    return subMitForm('About', 'about', 'aboutid') . '<hr><h2>this is home page</h2><div>Content</div><div>
    click "About" to go to About page
    </div>';
}
