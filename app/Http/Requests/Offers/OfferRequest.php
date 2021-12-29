<?php

namespace App\Http\Requests\Offers;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'property_id' => ['required', 'integer', 'exists:properties,id'],
            'offer_status_id' => ['required', 'integer', 'exists:offer_statuses,id'],
            'title' => ['required', 'string', 'max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
            'price' => ['required',  'numeric', 'min:1'],
            'comment' => ['nullable', 'string', 'max:255'],
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
            'property_id' => __('translations.offers.attribute.property'),
            'offer_status_id' => __('translations.offers.attribute.offer_status'),
            'title' => __('translations.offers.attribute.title') ,
            'start_date' => __('translations.offers.attribute.start_date'),
            'end_date' => __('translations.offers.attribute.end_date'),
            'price' =>  __('translations.offers.attribute.price'),
            'comment' => __('translations.offers.attribute.comment'),
        ];
    }
}
