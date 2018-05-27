<?php

namespace App\Application\User;


use App\Application\Command;
use App\Application\User\Validation\Rule\RegistrationRule;
use App\Application\CommandValidator;

class RegisterValidator implements CommandValidator
{
    /** @var  RegistrationRule[] */
    private $rules;

    /**
     * UserRegisterValidator constructor.
     * @param RegistrationRule[] $validationRules
     */
    public function __construct(array $validationRules)
    {
        $this->rules = $validationRules;
    }


    /**
     * @param Command $command
     * @param string $value
     * @return array
     */
    public function validate(Command $command, $value):array
    {

        $errors = [];

        foreach($this->rules as $rule){
            $errors = array_merge($rule->validate($command), $errors);
        }

//        if(null !== $value){
//            $this->validationRules->test($command);
//
//
//        }else{
//            $this->validationRules->test($command);
//        }

        return $errors;
    }

//    public function addRule(ValidationRule $rule): void
//    {
//        $this->validationRules[] = $rule;
//    }

}
