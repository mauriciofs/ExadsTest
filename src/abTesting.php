<?php
declare(strict_types=1);

namespace App;

/**
 * Exads would like to A/B test a number of promotional designs to see which provides the best conversion rate.
 * Write a snippet of PHP code that redirects end users to the different designs based on the database
 * table below. Extend the database model as needed.
 * i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
 * The code needs to be scalable as a single promotion may have upwards of 3 designs to test.
 *
 * @param array $designs - Designs to test in the format: ['name' => 50]
 * @return string - The design
 */
function abTestingRedirect(array $designs): string
{
    $abTesting = array();
    $startIndex = 0;
    //Fill auxialiry array taking probablity as number to fill
    foreach ($designs as $name => $probability) {
        //Concatenates with abTesting array
        $abTesting += array_fill($startIndex, $probability, $name);
        //Change index to get next designs
        $startIndex += $probability;
    }

    //Return random design to be redirect
    return $abTesting[rand(0, 99)];
}
