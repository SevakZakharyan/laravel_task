<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckUserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user() == null)
        {
            return false;
        }
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'manager' ||  Auth::user()->role == 'user')
        {   
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'',
            'email'=>'min:5|email|max:150|unique:users,email,'. $this->id,
            'role'=>'in:manager,user',
            'password'=>[
                         'nullable',
                         'required_with:confirm_password',
                         'min:5',
                         'same:confirm_password',
                         'string',
                         'regex:/[a-z]/',
                         'regex:/[A-Z]/',
                         'regex:/[0-9]/',
                         'regex:/[_-]/',
                        ],
        ];
    }

    public function messages()
    {
        return[
            'password.regex'=>'Password must contain at least one lowercase & uppercase letter one digit and one of the following symbols "-" or "_" '
        ];
    }
}
