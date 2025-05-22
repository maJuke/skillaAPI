<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'orderTypeId' => 'required|integer',
            'partnershipId' => 'required|integer',
            'userId' => 'required|integer',
            'description' => 'string',
            'date' => 'required|date',
            'address' => 'required|string',
            'amount' => 'required|integer',
            'status' => 'required|integer',
        ];
    }

    protected function prepareForValidation(): void {
        $this->merge([
            'type_id' => $this->orderTypeId,
            'partnership_id' => $this->partnershipId,
            'user_id' => $this->userId,
        ]);
    }
}
