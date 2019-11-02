<?php

/*
 * По заданной строке найдите размер самой длинной подстроки без повторяющихся символов. Вернуть числовой ответ.
 * Input: "abcabcbb"
 * Output: 3
 * Пояснение: Ответ "abc",с длиной 3.
 */

/*
 * получить строку abcafcd
 * переходим к следующему символу a
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a]
 * переходим к следующему символу b
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a, b]
 * переходим к следующему символу c
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a,b,c]
 * переходим к следующему символу a
 * проверяем есть ли такой в массиве
 * да -> сохраняем текущий массив [ [a,b,c] ], отчищаем массив и добавляем в массив [a]
 * переходим к след символу f
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a, f]
 * переходим к след символу c
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a,f,c]
 * переходим к след символу d
 * проверяем есть ли такой в массиве
 * нет -> добавляем в массив [a,f,c,d]
 * кончилась строка, добавляем текущий массив к массиву [ [a,b,c] , [a,f,c,d] ]
 * сравниваем размеры подмассивов и выводим больший по размеру
 */

$str = 'pwwkew';

function getUniqStr($str){
    $arr = str_split($str);
    $result = [];
    $temp = [];
    while ($arr){
        $current = array_shift($arr);
        if(!in_array($current, $temp)){
            $temp[] = $current;
        } else {
            $result[] = $temp;
            $temp = [];
            $temp[] = $current;
        }
    }
    $result[] = $temp;
    $max = [];
    for($i = 0; $i < count($result); $i++){
        if(count($result[$i]) > count($max)) $max = $result[$i];
    }
    echo "Ответ \"" . implode("", $max) . "\" с длиной " . count($max);
}

getUniqStr($str);
