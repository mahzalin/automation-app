<?php

namespace App\Http\Requests\Panel\Payment;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric',
            'receiverID' => 'required|numeric',
            'files.*' => 'nullable|mimes:pdf|max:10240'
        ];
    }
}
