<?php

namespace App;

use Exception;

/**
 * Handle GET request input params
 * 
 * allowed key = student
 */
class Input
{
    /**
     * Get request values
     *
     * @return integer Student ID
     */
    public static function get(): int
    {
        if (empty($_GET)) {
            return 0;
        }        
        
        $rawInput = $_GET;

        if (count($rawInput) !== 1) {
            throw new Exception('Invalid number of GET parameters');
        }

        if (strtolower(array_key_first($rawInput)) !== 'student') {
            throw new Exception("Invalid Get argument");
        }

        return (int)array_values($rawInput)[0];

    }
}