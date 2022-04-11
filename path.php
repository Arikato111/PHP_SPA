<?php
require("./package.php");

function RootContent()
{
    if (isset($_POST["page"])) {
        // set page //
        switch($_POST["page"]){
            case "home":
              return HomePage();
            case "about":
                return AboutPage();
            default: return '<div>Not Found Page</div>';
        }
        // set page //
    } else {
        return HomePage();
        // first page to show //
    }
}


// for user to choose page on click
// tittle is text to show | $id is id of form | page_value is use to switch case
function subMitForm($title, $page_value, $id)
{

    return '
    <form id="' . $id . '" action="" method="post">
        <input type="hidden" name="page" value="' . $page_value . '">
        <span onclick="document.getElementById(\'' . $id . '\').submit()">' . $title . '</span>
    </form>
    ';
}
// so you can write with yoursalf | add more | this just example