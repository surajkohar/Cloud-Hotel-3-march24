<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bookingStage2 extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'leadPassenger1'=>'required',
            'leadPassenger2'=>'nullable',
            'disability_support' => 'nullable',
            'lead_pasenger1_dob' => 'required|date|before_or_equal:'.now()->subDay()->format('Y-m-d'),
            'lead_pasenger2_dob' => $this->input('leadPassenger2') ? 'required|date|before_or_equal:' . now()->subDay()->format('Y-m-d') : 'nullable',
        ];
    }
}
