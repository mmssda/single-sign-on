<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
        'client_id'     => 'required',
        'name'          => 'required',
        'alias'         => 'required',
        'backend_path'  => 'required',
        'frontend_path' => 'required',
        'icon'          => 'required',
        'sort'          => 'required',
        'is_visible'    => 'required',
        ];
    }
}
