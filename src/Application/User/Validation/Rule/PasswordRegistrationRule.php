<?php

namespace App\Application\User\Validation\Rule;

use App\Application\Command;

class PasswordRegistrationRule implements RegistrationRule
{

    /**
     * @param Command $command
     * @return array
     */
    public function validate(Command $command):array
    {
        $error = ['pass' => 'error'];

        $data = $command->getData();

       return $error;
    }
}
