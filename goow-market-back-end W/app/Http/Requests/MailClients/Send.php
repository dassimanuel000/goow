<?php

namespace App\Http\Requests\MailClients;

use Illuminate\Foundation\Http\FormRequest;

class Send extends FormRequest
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
            'object' => 'required|min:5',
            'msg' => 'required|min:20',
            'from' => 'required',
            // 'lists' => 'required',
        ];
    }
}
