<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'model' => [
                'required',
                'string',
                'min:5',
                'max:255',
            ],
            'brand' => [
                'required',
                'string',
                'min:5',
                'max:1000',
            ],
            'year' => [
                'required',
                'string',
                'min:2',
                'max:4',
            ],
            'version' => [
                'string',
                'min:2',
                'max:4',
            ],
            'color' => [
                'string',
                'min:2',
                'max:6',
            ],
            'kilometer' => [
                'required',
                'numeric',
                'min:0',
                'max:999999999',
            ],
            'fuel' => [
                'string',
            ],
            'transmission' => [
                'string',
            ],
            'door' => [
                'numeric',
                'min:0',
                'max:4',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
                'max:999999999',
            ],
        ];

        // if ($this->method() === 'PATCH' || $this->method() === 'PUT') {

        //     $id = $this->id ?? $this->notice;

            // $rules['title'] = [
            //     'required',
            //     'string',
            //     'min:5',
            //     'max:255',
            //     Rule::unique('notices')->ignore($id),
            // ];
            // $rules['content'] = [
            //     'required',
            //     'string',
            //     'min:5',
            //     'max:1000',
            // ];
        // }

        return $rules;
    }
}
