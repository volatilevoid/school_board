<?php

namespace App;

use App\Interface\FormatOutputInterface;
use Spatie\ArrayToXml\ArrayToXml;

class OutputXML implements FormatOutputInterface
{
    public function getFormated(array $data): string
    {
        return ArrayToXml::convert($data);
    }
}
