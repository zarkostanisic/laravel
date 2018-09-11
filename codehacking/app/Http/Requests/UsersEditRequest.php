<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersEditRequest extends Request
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
        $email_rule = 'required|unique:users,id,' . $this->segment(2);
        $password_rule = 'confirmed';
        
        return [
           'name' => 'required',
            'email' => $email_rule,
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => $password_rule, 
        ];
    }
}
