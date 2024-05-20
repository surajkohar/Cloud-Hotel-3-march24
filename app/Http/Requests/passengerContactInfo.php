<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class passengerContactInfo extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|regex:/^(\+\d{1,3})?\d{10}$/',
            'postalCode' => 'required|regex:/^[0-9]{5,6}$/',
            'best_deals_and_holidays_notification'=>'required'
        ];
    }
}
