<?php

namespace App\Http\traits;

use Illuminate\Validation\Rule;

trait ValidationRuleTrait{
    /**
     * Regular expression for title field validation
     */
    public function regexAlphabetWithSpace()
    {
        return 'regex:/(^[A-Za-z ]+$)+/';
    }
    /**
     * Regular expression for numbers field with plus
     */
    public function regexNumbersAndPlus(){
        return 'regex:/(^[0-9+]+$)+/';
    }
    /**
     * Regular expression for numbers only
     */
    public function regexNumbersOnly(){
        return 'regex:/(^[0-9]+$)+/';
    }
    /**
     * Validation for checking if active or inactive
     * exists for the given input
    */
    public function validateActiveInactiveRule(){
        return Rule::in(['Active', 'Inactive']);
    }
    /**
     * Check if the image has following mimes
     *
    */
    public function validateImageMimes(){
        return 'mimes:jpeg,png,jpg';
    }
    /**
     * Validation for checking if the given id
     * exists in the given table
    */
    public function checkGivenidInTable($table_name){
        Rule::exists($table_name, 'id');
    }
    

}
?>
