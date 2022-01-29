<?php

namespace App;

use App\Interface\FormatOutputInterface;

class OutputJSON implements FormatOutputInterface
{
    public function getFormated(array $data): string
    {
        return json_encode($data);
    }
}
