<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'title'          => 'required|string|max:225',
           'description'    => 'required',
           'status'         => 'required',
        ];
    }
    public function messages()
    {
        return [
           'title.required'          => 'Title is required.',
           'description.required'    => 'Description is required.',
           'status.required'         => 'Status is required.',
        ];
    }
}
