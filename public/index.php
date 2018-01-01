<?php
require_once __DIR__ . '/../vendor/autoload.php';

// use App\TestA;

// $test = new TestA;
// function sum(int ...$input) : int
// {
//     return array_sum($input);
// }

// function test(int $input) : string
// {
//     return (string)$input + 1;
// }

// echo (string)sum('1', '3', '4', '33', '55');
// echo test('22');
// var_dump(test(22));

// function test() {
//     for ($i=0; $i < 10000; $i++) {
//         # code...
//         yield $i;
//     }
// }

function test()
{
    $return = [];
    for ($i=0; $i < 10000; $i++) {
        $return[] = $i;
    }
    return $return;
}

echo '使用前內存量' . memory_get_usage() . PHP_EOL;
$a = test();
echo '使用後內存' . memory_get_usage() . PHP_EOL;
unset($a);
echo '清除後內存' . memory_get_usage() . PHP_EOL;

