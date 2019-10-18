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
$str = '';

foreach ($dir as $item) {
    if($item == '.') continue;

    //проверка для определения картинки
    if($dir->getType() === 'dir')
        $img = 'folder.jpg';
    else
        $img = 'file.png';

    $str .= "<p><img src='img/{$img}' alt='' width='20px' height='20px'> ";

    //проверка, если папка - сделать ссылкой
    if($dir->getType() === 'dir')
        $str .= "<a href='?path={$item}'>{$item}</a></p>";
    else
        $str .= "{$item}</p>";



//    echo "<p><img src='img/{$img}' alt='' width='20px' height='20px'><a href='?path={$item}'>{$item}</a></p>";
}
echo $str;






