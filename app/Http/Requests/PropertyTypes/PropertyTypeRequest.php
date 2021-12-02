<?php

namespace App\Http\Requests\PropertyTypes;

use Illuminate\Foundation\Http\FormRequest;

class PropertyTypeRequest extends FormRequest
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
                'name' => [
                    'required', 'string', 'max:100', 'unique:property_types'
                ],
            
        ];
    }

    public function messages()
    {
        return[
            'name.unique' => __('validation.custom.property_types.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.property_types.attribute.name')
        ];
    }
}
