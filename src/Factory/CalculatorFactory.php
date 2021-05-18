<?php
declare(strict_types=1);

namespace App\Factory;

use ChrisKonnertz\StringCalc\StringCalc;

class CalculatorFactory
{
    public static function createCalculator(): StringCalc
    {
        return new StringCalc();
    }
}
