<?php
/*  * Copyright (c) 2022 ณวสันต์ วิศิษฏ์ศิงขร
    *
    * This source code is licensed under the MIT license found in the
    * LICENSE file in the root directory of this source tree.
*/
function import($dir)
{
    try {
        if (strpos($dir, './') !== false) {
            if (!file_exists($dir . '.php')) {
                throw new ParseError();
            }
            $data = substr(file_get_contents($dir . '.php'), 6);
            $run = <<<PHP
            return (function(){
                $data
            })();
            PHP;
            $run = str_replace('export:', 'return', $run);
            return eval($run);
        } elseif (strpos($dir, '/') !== false) {
            if (!file_exists('./modules/' . $dir . '.php')) {
              return throw new ParseError();
            }
            return require('./modules/' . $dir . '.php');

        } else {
            if (!file_exists('./modules/' . $dir . '/main.m.php')) {
                return throw new ParseError();
            }
            return require('./modules/' . $dir . '/main.m.php');
        }
    } catch (ParseError $err) {
        $message = 'can not import from ( \'' . $dir . '\' ) |  Please check your directory';
        echo 'ERROR ! import : ' . $message;
        // echo '<br>' ;
        $err= explode('#', $err);
        echo '<br>';
        echo $err= $err[sizeof($err)-2];
        echo '<br>';
        $state = false;
        $error = '';
        $str_len = strlen($err);
        for($i = 0;$i <$str_len; $i ++){
            if($err[$i] == "'" && !$state){
                $state = !$state;
            } elseif($err[$i] == "'" && $state){
                break;
            } elseif($state){
                $error .= $err[$i];
            }
        }
        echo 'Please check at ' . $error . '.php';
        die;
    }
}
