<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'=>'required',
            'family_name'=>'required',
            'last_name'=>'required',
            'group_id'=>'required',
            'phone'=>'required|max:10',
            'contact_phone'=>'required|max:10',
            'email'=>'required|email',
            'matricula'=>'required|unique:students|min:2|max:10',
            'age'=>'required',
        ];
    }

}