<?php

namespace App\Http\Requests\OfferStatuses;

use Illuminate\Foundation\Http\FormRequest;

class OfferStatusRequest extends FormRequest
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
                    'required', 'string', 'max:100', 'unique:offer_statuses'
                ],
            
        ];
    }

    public function messages()
    {
        return[
            'name.unique' => __('validation.custom.offer_statuses.name_unique')
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('translations.offer_statuses.attribute.name')
        ];
    }
}
