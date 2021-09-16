<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMerchantRequest extends FormRequest
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
            'user.first_name' => 'required',
            'user.last_name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.phone' => 'required',
            'merchant.title' => 'required|unique:merchants,title',
            'merchant.market_id' => 'required',
            'merchant.activity_id' => 'required',
            'merchant.status' => '',
        ];
    }
}
