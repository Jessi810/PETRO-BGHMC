<?php

namespace Petro\Http\Requests;

use \Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school'         => 'required|string',
            'year_graduated' => 'nullable|integer|min:1900|max:' . Carbon::now()->year,
            'degree'         => 'nullable|string',
            'scholar'        => 'nullable|string',
            'highlevel'      => 'nullable|string',
            'yearto'         => 'nullable|integer',
            'yearfrom'       => 'nullable|integer',
        ];
    }
}
