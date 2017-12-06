<?php

namespace App\Http\Requests;

use \Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'date' => 'nullable|date|before_or_equal:' . Carbon::now(),
            'description' => 'nullable|string',
        ];
    }
}
