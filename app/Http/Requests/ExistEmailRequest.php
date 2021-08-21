<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExistEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required','email','max:100','exists:users_data,email'],
            'password' => ['required','min:5','max:30','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/'],
        ];
    }
    public function messages()
    {
        return [
            'email.exists' => 'این ایمیل وجود ندارد',

        ];
    }
}
