<?php

// app/Services/CalculationService.php

namespace App\Services;

use App\Models\Calculation;

class CalculationService
{
    public function calculate($operator, $operand1, $operand2)
    {
        switch ($operator) {
            case 'add':
                $result = $operand1 + $operand2;
                break;
            case 'subtract':
                $result = $operand1 - $operand2;
                break;
            case 'multiply':
                $result = $operand1 * $operand2;
                break;
            case 'divide':
                $result = $operand1 / $operand2;
                break;
            default:
                throw new \InvalidArgumentException('Invalid operator.');
        }

        $userId = auth()->id();

        Calculation::create([
            'user_id'   => $userId,
            'operand1'  => $operand1,
            'operator'  => $operator,
            'operand2'  => $operand2,
            'result'    => $result,
        ]);

        return $result;
    }
}
