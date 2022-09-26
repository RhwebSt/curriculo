<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
class VerificaEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $user;
    public function __construct()
    {
        $this->user = new User;
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
        if ($this->user->where('email',$value)->count() < 1) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este email não esta cadastro.';
    }
}
