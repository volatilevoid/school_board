<?php

namespace App\Interface;

interface FormatOutputInterface
{
    public function getFormated(array $data): string;
}
