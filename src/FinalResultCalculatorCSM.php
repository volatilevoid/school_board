<?php

namespace App;

use App\Interface\CalcFinalResultInterface;
use App\Traits\CalcAverageTrait;

class FinalResultCalculatorCSM implements CalcFinalResultInterface
{
    use CalcAverageTrait;

    public function isPassed(array $grades): bool
    {
        $average = $this->calculateAverage($grades);

        return bccomp($average, 7.00, 2) !== -1;
    }
    
}