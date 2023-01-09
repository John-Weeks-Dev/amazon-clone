<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressOptionsStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'addr1' => 'required',
            'addr2' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ];
    }
}
