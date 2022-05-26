<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'max:100'],
            'lastname' => ['required', 'max:60'],
            'email' => [
                'required',
                'string',
                'email',
                'max:300'],
            'educative_program_id' => ['required'],
            'roles' => ['nullable'],
            'employee_key' => [
                'required',
                Rule::unique('users')->ignore($this->user()->id)],
            'password' => ['required'],
        ];
    }
}
