<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
function module($moduleName)
{
    return require('./modules/' . $moduleName . '/' . 'main.m.php');
}
function import(string $dir): void
{
    $getDir = glob($dir);
    if (!empty($getDir)) {
        foreach ($getDir as $file) {
            if (strpos(substr($file, 1), '.') !== false) {
                require_once("$file");
            } else {
                import("$file/*");
            }
        }
    }
}
