<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateCurrencyRequest
 * @package App\Requests
 */
class ValidatedCurrencyRequest extends FormRequest
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
            'title' =>      'required|max:255',
            'short_name' => 'required|min:2|max:10',
            'logo_url' =>   'required|url',
            'price' =>      'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'short_name.min'        => 'Too short short ^)',
            'logo_url.active_url'   => 'Broken link'
        ];
    }
}
