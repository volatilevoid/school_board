<?php

namespace App;

use App\Interface\CalcFinalResultInterface;

class FinalResultCalculatorCSMB implements CalcFinalResultInterface
{
    public function isPassed(array $grades): bool
    {
        $isPassed = false;
        
        sort($grades);

        if (count($grades) > 2) {
            array_shift($grades);
        }

        if ($grades[count($grades) - 1] > 9) {
            $isPassed = true;
        }

        return $isPassed;
    }
}