<?php

namespace App\Http\Requests;

use App\Rules\NoSpace;
use Illuminate\Foundation\Http\FormRequest;

class UserReuest extends FormRequest
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
            'first_name' => 'required|min:2|max:30|alpha_space', //alpha_space and persian_alpha use Anetwork/Validation library
            'last_name' => 'required|min:2|max:30|alpha_space',
            'email' => 'required|email|max:100',
            'password' => ['required','min:5','max:30','regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{5,30}$/'],
            'password_confirmation' => 'same:password',
            'checkbox' => 'required'
        ];
    }
}
