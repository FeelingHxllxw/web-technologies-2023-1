<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php-18</title>
</head>
<body>
<?php

function showInterval($startValue, $endValue)
{
    if ($startValue > $endValue)
        exit("Неправильный интервал!");
    $i = $startValue;
    do {
        $type = ($i == 0) ? "ноль" : (($i % 2 == 0) ? "четное число" : "нечетное число");
        echo "<p>$i – это $type.</p>";
        $i++;
    } while ($i <= $endValue);
}

echo "<h2>пункт 1</h2>";
showInterval(0, 10);

echo "<h2>пункт 2</h2>";
$localities = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Тюменская область' => ['Тюмень', 'Ишим', 'Тобольск', 'Заводоуковск']
];
foreach ($localities as $region => $cities) {
    echo "<h2>$region:</h2>";
    echo "<p>" . implode(', ', $cities) . "</p>";
}

echo "<h2>пункт 3</h2>";
function transliterate($string)
{
    $translit_array = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo',
        'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
        'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '',
        'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];
    $transliterated_string = '';
    $string = mb_strtolower($string, 'UTF-8');
    for ($i = 0; $i < mb_strlen($string, 'UTF-8'); $i++) {
        $symbol = mb_substr($string, $i, 1, 'UTF-8');
        if (array_key_exists($symbol, $translit_array)) {
            $transliterated_string .= $translit_array[$symbol];
        } else {
            $transliterated_string .= $symbol;
        }
    }
    return $transliterated_string;
}

$russian_word = "Образец текста для транслита";
$translit_result = transliterate($russian_word);
echo "<p>$translit_result</p>";

echo "<h2>пункт 4</h2>";
function renderMenu($menu)
{
    $output = '<ul>';
    foreach ($menu as $item) {
        $output .= '<li>' . $item['name'];
        if ($item['hasChildren']) {
            $output .= renderMenu($item['items']);
        }
        $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
}

$menu = [
    ['name' => 'Каталог товаров', 'hasChildren' => true, 'items' => [
        ['name' => 'Мойки', 'hasChildren' => true, 'items' => [
            ['name' => 'Первый вид мойки', 'hasChildren' => false, 'items' => []],
            ['name' => 'Второй вид мойки', 'hasChildren' => true, 'items' => [
                ['name' => 'Второй вид мойки образец 1', 'hasChildren' => false, 'items' => []],
                ['name' => 'Второй вид мойки образец 2', 'hasChildren' => false, 'items' => []]
            ]]
        ]],
        ['name' => 'Фильтры', 'hasChildren' => false, 'items' => []]
    ]]
];
echo renderMenu($menu);

echo "<h2>пункт 6</h2>";
foreach ($localities as $region => $cities) {
    $citiesWithK = array_filter($cities, function ($city) {
        return mb_substr(mb_strtolower($city), 0, 1) === 'к';
    });
    if (!empty($citiesWithK)) {
        echo "<h2>$region:</h2>";
        echo "<p>" . implode(', ', $citiesWithK) . "</p>";
    }
}
?>
</body>
</html>