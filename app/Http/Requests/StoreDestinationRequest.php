<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreDestinationRequest extends FormRequest
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
        return [
            'name'        => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'category'    => ['required', Rule::in(['darat', 'laut'])],
            'latitude'    => ['required', 'numeric', 'between:-90,90'],
            'longitude'   => ['required', 'numeric', 'between:-180,180'],
        ];
    }

    /**
     * Custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'Nama destinasi wajib diisi.',
            'name.max'             => 'Nama destinasi maksimal 150 karakter.',
            'description.required' => 'Deskripsi destinasi wajib diisi.',
            'category.required'    => 'Kategori destinasi wajib diisi.',
            'category.in'          => 'Kategori harus berupa "darat" atau "laut".',
            'latitude.required'    => 'Latitude wajib diisi.',
            'latitude.numeric'     => 'Latitude harus berupa angka.',
            'latitude.between'     => 'Latitude harus antara -90 sampai 90.',
            'longitude.required'   => 'Longitude wajib diisi.',
            'longitude.numeric'    => 'Longitude harus berupa angka.',
            'longitude.between'    => 'Longitude harus antara -180 sampai 180.',
        ];
    }

    /**
     * Handle a failed validation attempt — return JSON response.
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'status'  => 'error',
            'message' => 'Validation failed.',
            'data'    => [
                'errors' => $validator->errors(),
            ],
        ], 422));
    }
}
