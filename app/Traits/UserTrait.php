<?php

namespace App\Traits;

    trait UserTrait
    {
        public function isAdmin(){
            return auth()->user()->is_admin == 1;
        }
    }
?>

