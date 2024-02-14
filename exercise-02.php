<?php
/* Добавил немного больше проверок, на случай усложнения задачи */

$minInput = 2; // Определяем минимальное количество параметров
$maxInput = 2; // Определяем максимальное количество параметров
$numbers = []; // Создаём массив для чисел
if($argc > 1){
    if(($argc-1)<$minInput){
        fwrite(STDERR, "Вы указали недостаточно аргументов\n");
        exit;
    }elseif(($argc-1)>$maxInput){
        fwrite(STDERR, "Вы указали слишком много аргументов, обработаем только первые два\n");
    }
    // Заполняем массив числами
    for($i=1; $i <= $maxInput; $i++){
        $numbers[] = $argv[$i];
    }
}else{
    // Заполняем массив числами из STDIN
    for($i=0; $i < $maxInput; $i++){
        echo "Введите ". ($i+1) . " число: ";
        $numbers[] = trim(fgets(STDIN));
    }
}

// дальше без оверкодинга
if(!is_numeric($numbers[0]) || !is_numeric($numbers[1])){
    fwrite(STDERR, "Все параметры должны быть числами\n");
    exit;
}
if($numbers[1]==0){
    fwrite(STDERR, "Делить на 0 нельзя\n");
    exit;
}

echo "$numbers[0] / $numbers[1] = ". ($numbers[0]/$numbers[1]);
