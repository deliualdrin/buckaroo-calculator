<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorViewController extends Controller
{
    public function showCalculator()
    {
        $userCalculations = auth()->user()->calculations()->latest()->take(5)->get();

        return view('calculator', ['userCalculations' => $userCalculations]);
    }

}
