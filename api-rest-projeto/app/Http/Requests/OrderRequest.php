<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'subtotal' => 'required|numeric|min:0',
            'status' => 'required|in:cart,pending,paid,canceled',
            'payment_type' => 'nullable|in:credit_card,boleto,pix,cash',
        ];
    }
    public function messages(): array
    {
        return [
            'user_id.required' => 'O usuário é obrigatório.',
            'user_id.exists' => 'O usuário informado não existe.',
            'subtotal.required' => 'O subtotal é obrigatório.',
            'subtotal.numeric' => 'O subtotal deve ser um valor numérico.',
            'subtotal.min' => 'O subtotal não pode ser negativo.',
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status deve ser um dos seguintes: cart, pending, paid, canceled.',
            'payment_type.in' => 'O tipo de pagamento deve ser: credit_card, boleto, pix ou cash.',
        ];
    }
}
