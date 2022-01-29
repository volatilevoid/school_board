<?php

namespace App;

class SchoolApp
{
    public static function run()
    {
        try {
            Input::get();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        
    }
}