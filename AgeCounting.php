<?php

$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);
$json_data = json_decode($data, true);
$items = explode(', ', $json_data['data']);
$count = 0;
foreach ($items as $item) {
    if (strpos($item, 'age=') !== false) {
        $age = explode('=', $item)[1];

        if ($age >= 50)
            $count += 1;
    }
}


print_r($count); // 128


echo '<br>';
echo '<br>';
$count = array_reduce($items, function ($count, $item) {
    if (strpos($item, 'age=') !== false) {
        $age = explode('=', $item)[1];
        if ($age > 49) return $count + 1;
    }
    return $count;
}, 0);

print_r($count); // 128
