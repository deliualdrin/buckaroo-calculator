<?php

// app/Http/Requests/HistoryRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check() && $this->route('user') == Auth::id();
    }

    public function rules()
    {
        return [
        ];
    }
}

