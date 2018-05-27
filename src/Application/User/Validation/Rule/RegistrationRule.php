<?php

namespace App\Application\User\Validation\Rule;


use App\Application\Command;

interface RegistrationRule
{
    public function validate(Command $command): array;

}
