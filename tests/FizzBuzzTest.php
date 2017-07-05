<?php
declare(strict_types=1);

namespace App\Tests;

require_once dirname(__FILE__) . '/../src/fizzBuzz.php';

use PHPUnit\Framework\TestCase;
use function App\fizzBuzz;

/**
 * @covers FizzBuzz class
 */
final class FizzBuzzTest extends TestCase
{
    public function testFizzBuzzString(): void
    {
        $fizzBuzz = null;
        ob_start();
        fizzBuzz();
        $fizzBuzz = ob_get_contents();
        ob_end_clean();

        $this->assertEquals(md5($fizzBuzz), 'd0e6e868d231a6e1fbd87cc2c092676b');
    }
}
