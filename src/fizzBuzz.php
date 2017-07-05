<?php
declare(strict_types=1);

namespace App;

/**
 * Write a PHP script that prints all integer values from 1 to 100.
 * For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
 * Values which are multiples of both three and five should output as "FizzBuzz".
 *
 * @return void
 */
function fizzBuzz(): void
{
    for ($i=1; $i <= 100; $i++) {
        $return = "";
        $return .= $i % 3 === 0 ? "Fizz" : "";
        $return .= $i % 5 === 0 ? "Buzz" : "";

        echo ($return ? $return : $i) . PHP_EOL;
    }
}
