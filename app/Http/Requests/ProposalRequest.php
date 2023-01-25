<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
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
            'ProposalCreator_name' => 'required',
            'Proposal_Title' => 'required',
            'Proposal_date' => 'required',
            'Proposal_description' => 'required',
            'Proposal_objective' => 'required'
        ];
    }
}
