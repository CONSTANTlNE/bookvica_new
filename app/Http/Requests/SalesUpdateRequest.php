<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesUpdateRequest extends FormRequest
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
            'customer' => 'required|exists:customers,id',
            'inv_number' => 'required|string',
            'currency' => 'required|string',
            'ex_rate' => 'required|numeric',
            'price' => 'required|array|min:1',
            'price.*' => 'numeric',
            'price_gel' => 'required|array|min:1',
            'price_gel.*' => 'numeric',
            'title' => 'nullable|array|min:1',
            'title.*' => 'nullable|string',
            'invoice_id' => 'required|numeric|exists:sales_invoices,id',
            'book_id' => 'required|array|min:1',
            'book_id.*' => 'required|numeric|exists:books,id',
            'comment' => 'nullable|array',
            'comment.*' => 'nullable|string',
            'price_nb' => 'nullable|array|min:1',
            'price_nb.*' => 'nullable|numeric',
            'price_gel_nb' => 'nullable|array|min:1',
            'price_gel_nb.*' => 'nullable|numeric',

        ];
    }
}
