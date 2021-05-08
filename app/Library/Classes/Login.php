<?php

namespace App\Library\Classes;

class Login {

    public $user;
    public $password;

    function __construct($user, $password) {
        $this->user = $user;
        $this->password = $password;
    }

    public function user_can_login()
    {

    }
}
