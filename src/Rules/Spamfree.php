<?php

namespace Bitfumes\SpamFree\Rules;

use Illuminate\Contracts\Validation\Rule;
use Bitfumes\Spamfree\Main\Spam;

class Spamfree implements Rule
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
        try {
            return !resolve(Spam::class)->detect($value);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Spam Detected!! Please check for any Spam.';
    }
}
