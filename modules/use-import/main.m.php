<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
function import($dir)
{
    if (strpos($dir, './') !== false) {
        $data = substr(file_get_contents($dir . '.php'), 6);
        $run = <<<PHP
        return (function(){
            $data
        })();
        PHP;
        $run = str_replace('export:', 'return', $run);
        return eval($run);
    } elseif (strpos($dir, '/') !== false) {
        return require('./modules/' . $dir . '.php');
    } else {
        return require('./modules/' . $dir . '/main.m.php');
    }
}
