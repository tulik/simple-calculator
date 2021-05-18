<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\CalculationLog;
use ChrisKonnertz\StringCalc\StringCalc;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

class CalculatorService
{

    private StringCalc $calculator;

    public function __construct(StringCalc $stringCalc)
    {
        $this->calculator = $stringCalc;
    }

    public function getResult(FormInterface $form, CalculationLog $calculationLog): void
    {
        $result = 'NaN';
        try {
            $result = $this->calculator->calculate($calculationLog->getCalcInput());
        } catch (\Exception $e) {
            $form->addError(new FormError($e->getMessage()));
        }

        $calculationLog->setCalcOutput((string)$result);
    }
}
