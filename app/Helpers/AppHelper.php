<?php

namespace App\Helpers;

class AppHelper
{
    public static function isAdminPage() {
        if(Request()->route()->getPrefix() == '/admin') {
            return true;
        }
        return false;
    }
}
