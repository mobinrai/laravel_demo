<?php
namespace App\Http\traits;

trait CustomModelTrait{

    public function getPhoneNumberAttribute() {
        return "+{$this->country->phoneCode}{$this->phone}";
    }
    
}