<?php
function HomePage()
{
    return '<a href="about">about</a>
    <hr>
    <h2>this is home page</h2>
    <div>Content</div>
    <div>click "about" to go to about page</div>'
    . '<script>document.title = "home"</script>'; // use javascript to change title
    
}
