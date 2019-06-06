<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Support\Validation\Time;

class TeacherCreateRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'course_id' => ['required', 'exists:courses,id'],
            'schedules' => ['array', 'required'],
            'schedules.*.weekday' => ['required', Rule::in(['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'])],
            'schedules.*.start_id' => ['required', 'exists:times,id'],
            'schedules.*.end_id' => ['required', 'exists:times,id'],
        ];
    }
}
