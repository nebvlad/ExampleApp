<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'link' => 'required|max:2048',
            'enter_limit' => 'required|numeric',
            'expired_at'  => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'link.unique' => 'Такая ссылка уже есть в базе!',
            'link.required' => 'Поле "Ссылка" обязательно!',
            'enter_limit.required' => 'Поле "Лимит переходов" обязательно!',
            'expired_at.required'  => 'Поле "Время жизни ссылки" обязательно!',
        ];
    }
}
