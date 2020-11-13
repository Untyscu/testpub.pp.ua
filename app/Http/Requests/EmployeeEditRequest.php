<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeEditRequest extends FormRequest
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
            'fname' => 'required',
            'lname' => 'required',
            'wage' => 'integer',
            'departments' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'Поле Имя обязательно!',
            'lname.required' => 'Поле Фамилия обязательно!',
            'wage.integer' => 'Поле зарплата должно состоять только из цифр!',
            'departments.required' => 'Должен быть выбран хотя-бы один отдел!'
        ]; // TODO: Change the autogenerated stub
    }
}