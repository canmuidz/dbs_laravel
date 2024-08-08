<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            //
            'anh_san_pham' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // yêu cầu ảnh, loại ảnh và kích thước tối đa 2MB
            'tieu_de_san_pham' => 'required|string|max:255', // yêu cầu tiêu đề sản phẩm là chuỗi và không quá 255 ký tự
            'mo_ta_san_pham' => 'required|string', // mô tả sản phẩm có thể là null hoặc chuỗi
            'so_luong_phong' => 'required|integer|min:1', // yêu cầu số lượng phòng là số nguyên ít nhất là 1
            'gia' => 'required|numeric|min:0', // yêu cầu giá là số và không được âm
            'dien_tich' => 'required|numeric|min:0', // yêu cầu diện tích là số và không được âm
            'dia_chi' => 'required|string|max:255', // yêu cầu địa chỉ là chuỗi và không quá 255 ký tự
            'danh_muc_id' => 'required|exists:danh_mucs,id', // yêu cầu danh mục ID phải tồn tại trong bảng danh_mucs
            // 'user_id'     => 'required|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'anh_san_pham.required' => 'Ảnh sản phẩm là bắt buộc.',
            'anh_san_pham.image' => 'Ảnh sản phẩm phải là một tệp ảnh.',
            'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng: jpeg, png, jpg, gif, svg.',
            'anh_san_pham.max' => 'Ảnh sản phẩm không được lớn hơn 2MB.',
            'tieu_de_san_pham.required' => 'Tiêu đề sản phẩm là bắt buộc.',
            'tieu_de_san_pham.string' => 'Tiêu đề sản phẩm phải là một chuỗi.',
            'tieu_de_san_pham.max' => 'Tiêu đề sản phẩm không được vượt quá 255 ký tự.',
            'mo_ta_san_pham.string' => 'Mô tả sản phẩm phải là một chuỗi.',
            'mo_ta_san_pham.required' => 'Mô tả sản phẩm phải là một chuỗi.',
            'so_luong_phong.required' => 'Số lượng phòng là bắt buộc.',
            'so_luong_phong.integer' => 'Số lượng phòng phải là một số nguyên.',
            'so_luong_phong.min' => 'Số lượng phòng phải ít nhất là 1.',
            'gia.required' => 'Giá là bắt buộc.',
            'gia.numeric' => 'Giá phải là một số.',
            'gia.min' => 'Giá không được là số âm.',
            'dien_tich.required' => 'Diện tích là bắt buộc.',
            'dien_tich.numeric' => 'Diện tích phải là một số.',
            'dien_tich.min' => 'Diện tích không được là số âm.',
            'dia_chi.required' => 'Địa chỉ là bắt buộc.',
            'dia_chi.string' => 'Địa chỉ phải là một chuỗi.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'danh_muc_id.required' => 'Danh mục ID là bắt buộc.',
            'danh_muc_id.exists' => 'Danh mục ID phải tồn tại trong bảng danh_mucs.',
            // 'user_id.exists' => 'Người dùng phải tồn tại trong bảng danh_mucs.',

            // 'user_id.required' => 'Người dùng phải tồn tại trong bảng danh_mucs.',
         
        ];
    }
}
