<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BinhLuanRequest extends FormRequest
{
    public function authorize()
    {
        // Allow all users to use this request. You can add conditions if needed.
        return true;
    }

    public function rules()
    {
        return [
            'noi_dung' => 'required|string',
            'danh_gia' => 'required|integer|min:1|max:5',
            
        ];
    }

    public function messages()
    {
        return [
            'noi_dung.required' => 'Nội dung bình luận là bắt buộc.',
            'danh_gia.required' => 'Đánh giá là bắt buộc.',
            'danh_gia.integer' => 'Đánh giá phải là một số nguyên.',
            'danh_gia.min' => 'Đánh giá phải ít nhất là 1.',
            'danh_gia.max' => 'Đánh giá không thể lớn hơn 5.',
           
        ];
    }
}
