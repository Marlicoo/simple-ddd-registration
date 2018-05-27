<?php

namespace App\Application;


interface CommandValidator
{
    public function validate(Command $command, $value): array;
}
