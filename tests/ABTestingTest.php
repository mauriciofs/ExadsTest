<?php
declare(strict_types=1);

namespace App\Tests;

require_once dirname(__FILE__) . '/../src/abTesting.php';

use PHPUnit\Framework\TestCase;
use function App\abTestingRedirect;

/**
 * @covers FizzBuzz class
 */
final class ABTestingTest extends TestCase
{
    public function testABTestingWithDesignValues(): void
    {
        $design = abTestingRedirect(['design1' => 50, 'design2' => 25, 'design3' => 25]);
        $this->assertInternalType('string', $design);
        $this->assertRegExp('/design[1-3]/', $design);
    }

    public function testNextValidDrawBasedOnCurrentDate(): void
    {
        $design = abTestingRedirect(['design1' => 10, 'design2' => 10, 'design3' => 80]);
        $this->assertInternalType('string', $design);
        $this->assertRegExp('/design[1-3]/', $design);
    }
}
