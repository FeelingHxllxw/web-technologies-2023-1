<?php
date_default_timezone_set('Asia/Yekaterinburg');
$title = 'php-16';
$content_h1 = "Время";

function getCorrectFormatTime($current_time): string
{
    $current_hour = $current_time['tm_hour'];
    $current_min = $current_time['tm_min'];

    if ($current_hour > 4 && $current_hour < 21) {
        $hour_ps = 'часов';
    } elseif ($current_hour % 10 == 1) {
        $hour_ps = 'час';
    } else {
        $hour_ps = 'часа';
    }

    if (($current_min > 4 && $current_min < 21) || $current_min % 10 == 0 || $current_min % 10 > 4) {
        $min_ps = 'минут';
    } elseif ($current_min % 10 == 1) {
        $min_ps = 'минута';
    } else {
        $min_ps = 'минуты';
    }

    return sprintf("%d %s %d %s", $current_hour, $hour_ps, $current_min, $min_ps);
}

$current_time = localtime(time(), true);
$result = getCorrectFormatTime($current_time);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $content_h1 ?></h1>
    <h2><?= $result ?></h2>
</body>
</html>