<?php
namespace App\Enums;

class RolesEnum {

    const ADMINISTRATOR = 1;
    const USER = 2;


    public static function GetList() {
        return [
            Self::ADMINISTRATOR => __('Administrators'),
            Self::USER => __('User'),
        ];
    }

    public static function Get($id) {
        if (!empty(Self::GetList()[$id])) {
            return Self::GetList()[$id];
        }
        return null;
    }
}
