<?php

namespace App\Traits;

trait CalcAverageTrait
{
    public function calculateAverage(array $grades): float
    {
        return (float)array_sum($grades) / count($grades);
    }
}