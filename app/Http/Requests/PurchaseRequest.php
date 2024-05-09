<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'date' => 'required|date',
            'supplier' => 'required|exists:suppliers,id',
            'inv_number' => 'required|string',
            'title' => 'required|array|min:1',
            'title.*' => 'string',
            'currency' => 'required|string',
            'price' => 'required|array|min:1',
            'price.*' => 'numeric',
            'ex_rate' => 'required|numeric',
            'price_gel' => 'required|array|min:1',
            'price_gel.*' => 'numeric',
            'stock'=> 'required|array|min:1',
            'stock.*' => 'string',
            'comment' => 'nullable|array',
            'comment.*' => 'nullable|string',
        ];
    }
}
