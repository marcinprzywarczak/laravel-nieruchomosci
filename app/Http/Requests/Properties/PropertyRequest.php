<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'property_type_id' => ['required', 'integer', 'exists:property_types,id'],
            'address' => ['required', 'string', 'max:255'],
            'area_square_meters' => ['required', 'integer', 'min:1' ],
            'rooms' => ['nullable','integer', 'min:1' ],
            'floor' => ['nullable','integer', 'min:0' ],
            'number_of_floor' => ['nullable','integer', 'min:0' ],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return[
            //'name.unique' => __('validation.custom.property_types.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'property_type_id' => __('translations.properties.attribute.property_type'),
            'address' => __('translations.properties.attribute.address'),
            'area_square_meters' => __('translations.properties.attribute.area_square_meters'),
            'rooms' => __('translations.properties.attribute.rooms'),
            'floor' => __('translations.properties.attribute.floor'),
            'number_of_floor' => __('translations.properties.attribute.number_of_floor'),
            'description' => __('translations.properties.attribute.description'),
        ];
    }
}
