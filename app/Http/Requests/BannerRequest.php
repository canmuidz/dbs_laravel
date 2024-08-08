<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'banner' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
           
            //
        ];
    }

    public function messages(): array
    {
        return [
            //
            'banner.required' => 'Ảnh không được để trống',
            'banner.image' => 'Không phải ảnh vui lòng chọn lại',
            'banner.mimes' => 'Ảnh không đúng định dạng jpg,jpeg,png',
            'banner.max' => 'Ảnh quá lớn, không thành công',
        ];
    }
}
