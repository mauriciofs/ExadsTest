<?php

/**
 * The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
 * Write a function or class that calculates and returns the next valid draw date based on the current
 * date and time AND also on an optionally supplied date and time.
 */
declare(strict_types=1);

namespace App;

class LotteryDraw
{
    public function getNextDraw(string $date = "now") : \DateTime
    {
        try {
            // Creates the DateTime and leaves the constructor handle invalid dates
            $inputDate = new \DateTime($date);

            //Check if inputDate is a valid draw date
            if (in_array($inputDate->format('D'), ['Sat', 'Wed']) && $inputDate->format('G') < 20) {
                return $inputDate->setTime(20, 0);
            }

            //Check if inputDate is Sun, Mon or Tuesday to get next wed otherwise should get next saturday
            return in_array($inputDate->format('D'), ['Sun', 'Mon', 'Tue', 'Sat']) ?
                    $inputDate->modify('next Wednesday')->setTime(20, 0) :
                    $inputDate->modify('next Saturday')->setTime(20, 0);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("Invalid date format, expected yyyy-mm-dd hh:mm:ss");
        }
    }
}
