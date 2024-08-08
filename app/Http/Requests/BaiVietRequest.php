<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiVietRequest extends FormRequest
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
            'tieu_de_bai_viet' => 'required|max:255',
            'anh_bai_viet' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'noi_dung' => 'required',
            'mo_ta_ngan' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'tieu_de_bai_viet.required' => 'Tiêu đề không được để trống',
            'tieu_de_bai_viet.max' => 'Tiêu đề ngắn hơn 255 ký tự',

            'anh_bai_viet.required' => 'Ảnh không được để trống',
            'anh_bai_viet.image' => 'Không phải ảnh vui lòng chọn lại',
            'anh_bai_viet.mimes' => 'Không đúng định dạng ảnh jpg,jpeg,png',
            'anh_bai_viet.max' => 'Ảnh quá nặng',

            'noi_dung.required' => 'Nội dung không được để trống',

            'mo_ta_ngan.required' => 'Mô tả ngắn không được để trống',
            'mo_ta_ngan.max' => 'Mô tả ngắn hơn 255 ký tự',

        ];
    }
}
