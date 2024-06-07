<?php
//Задание 1
$a = -10;
$b = -5;

function calculate($a, $b) {
    if ($a >= 0 && $b >= 0) {
        return $a - $b;
    } elseif ($a < 0 && $b < 0) {
        return $a * $b;
    } else {
        return $a + $b;
    }
}

$result1 = calculate($a, $b);
echo ("<p><b>Задание 1</b></p>" . "<p>Результат = " . $result1 . "</p>");

//Задание 2
// Со switch
echo ("<p><b>Задание 2 со switch</b></p>");
$a = rand(0, 15);

echo "<p>Значение переменной \$a: $a</p>";
echo "<p>Числа от \$a до 15:</p>";

// Используем оператор switch для вывода чисел от $a до 15
switch ($a) {
    case 0:
        echo "0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 1:
        echo "1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 2:
        echo "2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 3:
        echo "3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 4:
        echo "4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 5:
        echo "5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 6:
        echo "6, 7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 7:
        echo "7, 8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 8:
        echo "8, 9, 10, 11, 12, 13, 14, 15";
        break;
    case 9:
        echo "9, 10, 11, 12, 13, 14, 15";
        break;
    case 10:
        echo "10, 11, 12, 13, 14, 15";
        break;
    case 11:
        echo "11, 12, 13, 14, 15";
        break;
    case 12:
        echo "12, 13, 14, 15";
        break;
    case 13:
        echo "13, 14, 15";
        break;
    case 14:
        echo "14, 15";
        break;
    case 15:
        echo "15";
        break;
}
// Без switch
$result2 = "";
for ($i = $a; $i <= 15; $i++) {
    $result2 .= $i . ", ";
}
$result2 = rtrim($result2, ", ");
echo ("<p><b>Задание 2 , без switch</b></p>" . "<p>Результат = " . $result2 . "</p>");

//Задание 3
function summ($a, $b) {
    return $a + $b;
}

function multiplication($a, $b) {
    return $a * $b;
}

function difference($a, $b) {
    return $a - $b;
}

function division($a, $b) {
    return $a / $b;
}

echo ("<p><b>Задание 3</b></p>" .
"<p>3 + 5 = " . summ(3, 5) . "</p>" .
"<p>8 - 4 = " . difference(8, 4) . "</p>" .
"<p>7 * 4 = " . multiplication(7, 4) . "</p>" .
"<p>9 / 3 = " . division(9, 3) . "</p>");

//Задание 4
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return summ($arg1, $arg2);
        case '-':
            return difference($arg1, $arg2);
        case '*':
            return multiplication($arg1, $arg2);
        case '/':
            return division($arg1, $arg2);
        default:
            return 0;
    }
}
echo ("<p><b>Задание 4</b></p>" .
"<p>Сумма чисел 15 и 7 = " . mathOperation(15, 7, "+") . "</p>");

//Задание 6
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    } elseif ($pow < 0) {
        return 1 / power($val, -$pow);
    } else {
        return $val * power($val, $pow - 1);
    }
}
echo ("<p><b>Задание 6</b></p>" .
"<p>Число 2 в 4 степени = " . power(2, 4) . "</p>");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 17</title>
</head>
<body>

</body>
</html>