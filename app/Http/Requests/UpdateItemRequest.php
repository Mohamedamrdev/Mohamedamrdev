<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
            'item_date' => 'required|date',
            'title' => 'required|string',
            'licence' => 'string',
            'dimension' => 'string',
            'price' => 'integer',
            'format' => 'nullable',
            'active' => 'nullable|boolean',
            'tag_id' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',// الصورة ليست مطلوبة أثناء التحديث
        ];
    }
}
