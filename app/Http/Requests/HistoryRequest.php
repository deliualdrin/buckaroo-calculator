<?php

// app/Http/Requests/HistoryRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HistoryRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->route('user');

        return Auth::check() && $user && $user == Auth::id();
    }

    public function rules()
    {
        return [
        ];
    }
}

