<?php
$string = "A man, a plan, a canal, Panama";
$string2 = "Random string";

function is_palindrome($string)
{
    $a = strtolower(preg_replace("/[^A-Za-z0-9А-Яа-я]/","",$string));
    return $a==strrev($a)? 'палиндром' : 'не палиндром';
}

echo "A man, a plan, a canal, Panama - " . is_palindrome($string) . PHP_EOL;
echo "Random string - " . is_palindrome($string2);
