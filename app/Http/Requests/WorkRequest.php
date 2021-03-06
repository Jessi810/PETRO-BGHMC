<?php

namespace Petro\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkRequest extends FormRequest
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
            'company_name' => 'required|string',
            'position' => 'nullable|string',
            'datefrom' => 'nullable|date|date_format:Y-m-d|before_or_equal:dateto',
            'dateto' => 'nullable|date|date_format:Y-m-d|after_or_equal:datefrom',
            'description' => 'nullable|string',
        ];
    }
}
