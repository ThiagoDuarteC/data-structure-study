<?php

function quicksort(array $array): array
{
    $partition = function ($low, $high) use (&$array, &$partition) {
        $pivot = $array[$high];
        $i = $low - 1;
        for ($j = $low; $j < $high; $j++) {
            if ($array[$j] <= $pivot) {
                $i++;
                [$array[$i], $array[$j]] = [$array[$j], $array[$i]];
            }
        }
        [$array[$i+1], $array[$high]] = [$array[$high], $array[$i+1]];
        return $i++;
    };

    $quicksort_recursive = function($low, $high) use (&$array, &$partition, &$quicksort_recursive): void{
        if ($low < $high) {
            $pi = $partition($low, $high);
            $quicksort_recursive($low, $pi - 1);
            $quicksort_recursive($pi + 1, $high);
        }
    };

    $quicksort_recursive(0, count($array) - 1);
    return $array;
}

// Array gerado por IA para teste
$array = [
    523, 87, 649, 312, 955, 208, 764, 431, 675, 120,
    899, 33, 582, 741, 267, 444, 521, 695, 812, 145,
    377, 942, 68, 274, 806, 551, 13, 619, 478, 795,
    367, 911, 254, 604, 336, 752, 401, 893, 269, 719,
    528, 389, 964, 155, 674, 32, 851, 237, 516, 780,
    991, 299, 463, 553, 108, 906, 417, 864, 277, 94,
    338, 769, 142, 501, 610, 82, 947, 358, 792, 215,
    488, 627, 276, 159, 418, 623, 950, 193, 593, 375,
    144, 264, 759, 885, 420, 242, 317, 926, 576, 104,
    233, 895, 784, 455, 715, 627, 970, 85, 316, 741
];

echo "Array original: ";
print_r($array);
$sorted_array = quicksort($array);
echo "Array ordenado: ";
print_r($sorted_array);
