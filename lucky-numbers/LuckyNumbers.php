<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        return (int)implode("", $digitsOfNumber1) + (int)implode("", $digitsOfNumber2);
    }

    public function isPalindrome(int $number): bool
    {
        return (string)$number === strrev((string) $number);
    }

    public function validate(string $input): string
    {      
        if(strlen($input) <= 0)
        {
            return "Required field";
        } 
        else if((int) $input <= 0) 
        {
            return "Must be a whole number larger than 0";
        }
        else
        {
            return "";
        }
    }
}
