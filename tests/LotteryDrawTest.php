<?php
declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\LotteryDraw;

/**
 * @covers FizzBuzz class
 */
final class LoteryDrawTest extends TestCase
{
    protected $lottery;

    protected function setUp() : void
    {
        $this->lottery = new LotteryDraw();
    }

    public function testNextValidDrawBasedOnCurrentDate(): void
    {
        $nextDraw = $this->lottery->getNextDraw();
        $this->assertInstanceOf("DateTime", $nextDraw);
        $this->assertRegExp('/(Wed|Sat)/', $nextDraw->format('D'));
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid date format, expected yyyy-mm-dd hh:mm:ss
     */
    public function testtNextValidDrawWithInvalidDate() : void
    {
        $nextDraw = $this->lottery->getNextDraw("rubish");
    }

    public function testNextValidDrawWithDateTimeSet() : void
    {
        $nextDraw = $this->lottery->getNextDraw('2017-07-07 15:00:00');
        $this->assertInstanceOf("DateTime", $nextDraw);
        $this->assertEquals('Sat', $nextDraw->format('D'));
    }

    public function testNextValidDrawWithDrawDateAfter8pm(): void
    {
        $nextDraw = $this->lottery->getNextDraw('2017-07-08 20:10:00');
        $this->assertInstanceOf("DateTime", $nextDraw);
        $this->assertEquals('Wed', $nextDraw->format('D'));
    }

    public function testNextValidDrawWithMondayDate() : void
    {
        $nextDraw = $this->lottery->getNextDraw('2017-07-10 11:00:00');
        $this->assertInstanceOf("DateTime", $nextDraw);
        $this->assertEquals('Wed', $nextDraw->format('D'));
    }

    public function testNextValidDrawWithThursdayDate() : void
    {
        $nextDraw = $this->lottery->getNextDraw('2017-07-13 11:00:00');
        $this->assertInstanceOf("DateTime", $nextDraw);
        $this->assertEquals('Sat', $nextDraw->format('D'));
    }
}
