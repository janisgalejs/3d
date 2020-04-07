<?php

function classAutoload()
{
    // list of folders, which contain Classes to be loaded
    $classDirs = [
        'vendors/core/',
        'app/models/',
        'app/controllers/'
        ];

    foreach ($classDirs as $dir) {

        if (! is_dir($dir)) {
            continue;
        }

        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if (! is_dir($file) && pathinfo($file)['extension'] == 'php') {
                    include $dir.$file;
                }
            }
            closedir($dh);
        }

    }
}

classAutoload();
