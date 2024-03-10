<?php

function getViewCount(string $jsonString): int
{
    $data = json_decode($jsonString, true);
    $sum = 0;
    if (count($data['videos'])) {
        foreach ($data['videos'] as $value) {
            $sum += $value['viewCount'];
        }
    }
    return $sum;
}

$jsonString = '{
    "apiVersion":"2.1",
    "videos":[
        {
            "id":"253",
            "category":"Music",
            "title":"Jingle Bells",
            "duration":457,
            "viewCount":88270796
        }
    ]
}';

echo getViewCount($jsonString);