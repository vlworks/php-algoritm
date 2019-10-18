<?php

if ($_SERVER['QUERY_STRING']){
    $path = $_GET['path'];

    if ($_GET['path'] === '..'){
        $pathString = "forexplorer/";
    } else {
        $pathString = "forexplorer/{$path}";
    }

} else {
    $pathString = "forexplorer/";
}

$dir = new DirectoryIterator($pathString);

foreach ($dir as $item) {
    echo "<p><a href='?path={$item}'>{$item}</a></p>";
}






