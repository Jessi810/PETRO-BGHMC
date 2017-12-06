<?php

namespace App\Http\Requests;

use \Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
            'name'        => 'required|string',
            'agency_name' => 'required|string',
            'type'        => 'required|string',

            // Personal details
            'current_position' => 'nullable|string',
            'email'            => 'nullable|email',
            'address'          => 'nullable|string',
            'mobile'           => 'nullable|string',
            'phone'            => 'nullable|string',
            
            // Certification
            'cert_title.*'       => 'sometimes|required|string',
            'cert_date.*'        => 'sometimes|nullable|date|before_or_equal:' . Carbon::now(),
            'cert_description.*' => 'sometimes|nullable|string',

            // Education
            'school.*'         => 'sometimes|required|string',
            'year_graduated.*' => 'sometimes|nullable|integer|min:1900|max:' . Carbon::now()->year,
            'major.*'          => 'sometimes|nullable|integer',
            'minor.*'          => 'sometimes|nullable|integer',

            // Expertise
            'exp_title.*'       => 'sometimes|required|string',
            // 'exp_description' => 'sometimes|nullable|string',

            // Skill
            'skill_title.*'       => 'sometimes|required|string',
            'skill_proficiency.*' => 'sometimes|nullable|integer|min:1|max:100',
            'skill_description.*' => 'sometimes|nullable|string',

            // Work
            'work_name.*'         => 'sometimes|required|string',
            'work_company_name.*' => 'sometimes|required|string',
            'work_position.*'     => 'sometimes|nullable|string',
            'work_datefrom.*'     => 'sometimes|nullable|date|before_or_equal:dateto',
            'work_dateto.*'       => 'sometimes|nullable|date|after_or_equal:datefrom',
            'work_description.*'  => 'sometimes|nullable|string',
        ];
    }
}
