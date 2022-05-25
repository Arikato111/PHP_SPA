<?php
function AboutPage(){
    $head = '<div><a href="/">home</a><hr><a href="/about?mode=hot">hot</a> | 
    <a href="/about?mode=new">new</a> | <a href="about">default</a><hr></div>';
    
    if(isset($_GET['mode'])){
        if($_GET['mode'] == 'new'){
            $mode = NewMode();
        } else if ($_GET['mode'] == 'hot'){
            $mode = HotMode();
        }
    } else {
        $mode = DefaultMode();
    }
    
    return $head . $mode . '<script>document.title = "about"</script>'; // and use javascript to change title
}

function NewMode(){
    return '<div><h1>This is New Feed</h1></div>';
}

function HotMode(){
    return '<div><h1>This is hot mode</h1></div>';
}

function DefaultMode(){
    return '<div>click<a href="?page=about&mode=hot">hot</a>or<a href="?page=about&mode=new">new</a>to switch mode</div>';
}