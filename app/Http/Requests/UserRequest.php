<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:30|alpha_space', //alpha_space use Anetwork/Validation library. to use it Enter 'composer require Anetwork/Validation' in terminal
            'last_name' => 'required|min:2|max:30|alpha_space',
            'email' => ['required','email','max:100',Rule::unique('users_data')->ignore($this->user)],
            'password' => [Rule::requiredIf($this->isMethod('post')),'min:5','max:30','confirmed','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/'],
            'checkbox' => [Rule::requiredIf($this->isMethod('post'))]
        ];
    }


    public function messages()
    {
        return[
            'checkbox.required' => 'پذیرفتن قوانین الزامی است.'
        ];
    }
}
