<?php

namespace App\Application;


interface Command
{
    public function getData(): array;
}
