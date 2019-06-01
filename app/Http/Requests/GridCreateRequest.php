<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Support\Validation\Time;

class GridCreateRequest extends FormRequest
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
            'class_id' => ['required', 'exists:classes,id'],
            'schedules' => ['nullable', 'array'],
            'schedules.*' => ['required', 'integer', 'exists:schedules,id'],
        ];
    }
}
