<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>['required', 'string'],
           'slug'=>['required', 'string'],
            'sku'=>['required', 'string'],
            'price'=>['required', 'integer'],
            'weight'=>['required', 'integer'],
            'title'=>['required', 'string'],
            'trending' => 'nullable',
            'quantity'=>['required', 'integer'],
            'small_description'=>['required', 'string'],
            'description'=>['required', 'string'],
            // 'image'=>['nullable','image', 'mimes:jpg,jpeg,png'],
            // 'image'=>'nullable|image',
            'category_id'=>['required', 'integer'],
            'brand_id'=>['required', 'integer'],
            'meta_title'=>['required', 'string'],
            'meta_keyword'=>['required', 'string'],
            'meta_description'=>['required', 'string'],
        ];
    }
}
