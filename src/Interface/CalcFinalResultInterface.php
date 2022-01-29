<?php

namespace App\Interface;

interface CalcFinalResultInterface
{
    public function isPassed(array $grades): bool;
}
