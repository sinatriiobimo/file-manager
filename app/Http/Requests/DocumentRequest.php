<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
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
        return [
            'category_id' => 'required|integer|exists:categories,id',
            'filename' => 'required|max:255',
            'description' => 'required',
            'file' => 'required|file|max:10000|mimes:pdf,doc,docx,ppt,pptx,xlsx,xlsm,xlsb,zip,rar,jpg,jpeg,png,gif',
        ];
    }
}
