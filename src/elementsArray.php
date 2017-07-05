<?php
declare(strict_types=1);

namespace App;

/**
 * Write a PHP script to generate a random array of 500 integers (values of 1 – 500 inclusive).
 * Randomly remove and discard an arbitary element from this newly generated array.
 * Write the code to efficiently determine the value of the missing element.
 * Explain your reasoning with comments.
 *
 * @return int
 */
function elementsArray(): int
{
    //Generates array and shuffle elements
    $randomArray = range(1, 500);
    shuffle($randomArray);

    //Gets one random key from it
    $randKey = array_rand($randomArray);
    //Gets the value to remove
    $randValue = $randomArray[$randKey];
    
    //Remove the key from the array
    unset($randomArray[$randKey]);

    //Return value removed
    return $randValue;
}
