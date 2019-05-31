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
            'course' => ['required', Rule::in(['Matemática', 'História', 'Educação Física', 'Português', 'Biologia'])],
            'schedules' => ['array', 'required'],
            'schedules.*.weekday' => ['required', Rule::in(['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'])],
            'schedules.*.start_time' => ['required', new Time],
            'schedules.*.end_time' => ['required', new Time],
        ];
    }
}
