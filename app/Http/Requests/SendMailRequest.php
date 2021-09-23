<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
{
    // protected $redirect = route('home', '#kontakt');

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
    $this->redirect = route('home', '#contact-form');
    // str_replace('?', '', $this->redirect = route('home', '#alert'));

        return [
            'name' => 'required|string|max:64',
            'email' => 'required|string|email|max:64',
            'content' => 'required|string',
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Musíte vyplniť meno',
        'email.required' => 'Musíte vyplniť email',
        'content.required' => 'Musíte vyplniť správu',
    ];
}

}
