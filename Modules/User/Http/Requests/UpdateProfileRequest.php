<?php

namespace Workable\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'bio' => 'max:255',
            'country' => 'string',
            'region' => 'string',
            'city' => 'string',
            'email' => 'required|string|email',
            'gender' => 'int',
            'birthday' => 'date',
            'phone' => 'required|int|',
        ];
    }
}
