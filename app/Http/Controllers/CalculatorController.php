<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CalculationService;

class CalculatorController extends Controller
{
    private $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function calculate(CalculationRequest $request)
    {
        $operator = $request->input('operator');
        $operand1 = $request->input('operand1');
        $operand2 = $request->input('operand2');

        try {
            $result = $this->calculationService->calculate($operator, $operand1, $operand2);

            return response()->json(['result' => $result]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function history(HistoryRequest $request, User $user)
    {
        $history = $user->calculations;

        return response()->json(['history' => $history]);
    }
}
