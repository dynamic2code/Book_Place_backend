<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>['required'],
            "email" =>['required'],
            "password" =>['required'],
            "address" => ['required']
        ];
    }

    function prepareForValidation()
    {
        $this->merge([
            'password' => bcrypt($this->password),
            'user_address'=>  $this->address
        ]);
    }
}