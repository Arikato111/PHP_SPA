# all-in-one-page-php
# this is template of php 
# is work on single page and try to use function for page 

when use if you need to create new file in page folder don't forgot to use import on package.php, should not use require or include for folder*

and set path in path.php with Route() and use inside [] of SwitchPath

Route() need path and callback function to return page function

don't let Page function be emty or null

if use MySQL Database , Must use $GLOBALS['conn'] instead of $conn

if want to change title, use title() 
