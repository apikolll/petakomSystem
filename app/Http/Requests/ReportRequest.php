<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ReportCreator_name' => 'required',
            'Report_Title' => 'required',
            'Report_date' => 'required',
            'Report_description' => 'required',
            'Report_objective' => 'required'
        ];
    }
}
