<?php

namespace App\Application\User\Validation\Rule;

use App\Application\Command;


class EmailRegistrationRule implements RegistrationRule
{

    /**
     * @var array
     */
    public static $errors;

    /**
     * @param Command $command
     * @return array
     */
    public function validate(Command $command): array
    {
        $error = [];
        $userData = $command->getData();

        if (!\filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {

            $error = ['email' => 'Błędy adrs email'];
        }

        return $error;
    }
}