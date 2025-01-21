<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Define your authorization logic, for example:
        return true;
    }

    public function rules()
    {
        return [
            'number' => ['nullable', 'string', Rule::unique('orders')->ignore(request()->order_id)],
            'transaction_reference' => ['required', 'string', Rule::unique('orders')->ignore(request()->order_id)],
            'shipping_fee' => 'required|numeric|min:0',
            'books_total' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:delivered,pending,refunded',
            'payment_status' => 'required|in:paid,pending,refunded',
            'payment_type' => 'required|in:cash,visa',
            'tax_amount' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'shipping_area_id' => 'required|exists:shipping_areas,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        if( App::getLocale() === 'en'){
            return [
                'transaction_reference.required' => __('The transaction reference is required.'),
                'transaction_reference.unique' => __('The transaction reference has already been taken.'),
                'shipping_fee.required' => __('The shipping fee is required.'),
                'shipping_fee.numeric' => __('The shipping fee must be a number.'),
                'books_total.required' => __('The books total is required.'),
                'books_total.numeric' => __('The books total must be a number.'),
                'total.required' => __('The total is required.'),
                'total.numeric' => __('The total must be a number.'),
                'status.required' => __('The status is required.'),
                'payment_status.required' => __('The payment status is required.'),
                'payment_type.required' => __('The payment type is required.'),
                'tax_amount.required' => __('The tax amount is required.'),
                'tax_amount.numeric' => __('The tax amount must be a number.'),
                'address.required' => __('The address is required.'),
                'shipping_area_id.required' => __('The shipping area is required.'),
                'shipping_area_id.exists' => __('The selected shipping area is invalid.'),
                'user_id.required' => __('The user is required.'),
                'user_id.exists' => __('The selected user is invalid.'),
            ];
        }else{
            return [
                'transaction_reference.required' => __('مرجع المعاملة مطلوب'),
                'transaction_reference.unique' => __('مرجع المعاملة موجود مسبقاً'),
                'shipping_fee.required' => __('رسم الشحن مطلوب'),
                'shipping_fee.numeric' => __('رسم الشحن يجب أن يكون رقمًا'),
                'books_total.required' => __('إجمالي الكتب مطلوب'),
                'books_total.numeric' => __('إجمالي الكتب يجب أن يكون رقمًا'),
                'total.required' => __('المجموع مطلوب'),
                'total.numeric' => __('المجموع يجب أن يكون رقمًا'),
                'status.required' => __('الحالة مطلوبة'),
                'payment_status.required' => __('حالة الدفع مطلوبة'),
                'payment_type.required' => __('نوع الدفع مطلوب'),
                'tax_amount.required' => __('مبلغ الضريبة مطلوب'),
                'tax_amount.numeric' => __('مبلغ الضريبة يجب أن يكون رقمًا'),
                'address.required' => __('العنوان مطلوب'),
                'shipping_area_id.required' => __('منطقة الشحن مطلوبة'),
                'shipping_area_id.exists' => __('منطقة الشحن المحددة غير صالحة'),
                'user_id.required' => __('المستخدم مطلوب'),
                'user_id.exists' => __('المستخدم المحدد غير صالح'),
            ];
        }
   
    }
}