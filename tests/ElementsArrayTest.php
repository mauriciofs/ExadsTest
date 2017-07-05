<?php
declare(strict_types=1);

namespace App\Tests;

require_once dirname(__FILE__) . '/../src/elementsArray.php';

use PHPUnit\Framework\TestCase;
use function App\elementsArray;

/**
 * @covers FizzBuzz class
 */
final class ElementsArrayTest extends TestCase
{
    public function testElementsArray(): void
    {
        $missingItem = elementsArray();
        //Check var type
        $this->assertInternalType('int', $missingItem);
        //Check if its greater than 1
        $this->assertGreaterThan(1, $missingItem);
        //And less or equal than 500
        $this->assertLessThanOrEqual(500, $missingItem);
    }
}
