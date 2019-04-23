<?php

namespace App\Support\Validation;

use Illuminate\Contracts\Validation\Rule;

class Time implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(preg_match('/^[0-2]\d:[0-5]\d(:[0-5]\d)?$/', $value)) {
            $hour = explode(':', $value)[0];
            
            return ((int)$hour < 24);
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The time format is invalid.';
    }
}
