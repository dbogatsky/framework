<?php
//! Description
/**
* @date 3/28/13 11:29 AM
* @version 0.1
* @author Dmitry Bogatsky dbogatsky@gmail.com
*/

namespace app\models;

class Palindromic
{
    private
            $startFactorValue     = 10, // min value of factor
            $factorLimit          = 99, // max value of factor
            $firstFactor          = 10,
            $secondFactor         = 10,
            $palindromes          = array(),
            $defaultFactorsLength = 2,
            $factorsThatGivePalindromic = array();

    public function __construct($length = 2)
    {
        if ($length == $this->defaultFactorsLength) return;
        // set values of parameters
        for ($i = $this->defaultFactorsLength; $i < $length; $i++)
        {
            $this->factorLimit      .= 9;
            $this->startFactorValue .= 0;
        }
        $this->firstFactor = $this->secondFactor = $this->startFactorValue;
    }

    public function getTheLargest()
    {
        while($this->firstFactor <= $this->factorLimit)
        {
            $value = ++$this->firstFactor * $this->secondFactor;

            if($this->isPalindromic($value))
            {
                $this->palindromes[] = $value;
                $this->factorsThatGivePalindromic[$value] = array($this->firstFactor, $this->secondFactor);
            }

            if($this->firstFactor == $this->factorLimit && $this->secondFactor < $this->factorLimit)
            {// to start a new cycle iteration
                $this->firstFactor = $this->startFactorValue;
                $this->secondFactor++;
            }
        }
        return max($this->palindromes);
    }

    private function isPalindromic($value)
    {
        return $value == strrev($value);
    }

    public function getFactorsThatGivePalindromic($palindromic)
    {
        if(!isset($this->factorsThatGivePalindromic[$palindromic])) return false;

        return $this->factorsThatGivePalindromic[$palindromic];
    }
}

?>

