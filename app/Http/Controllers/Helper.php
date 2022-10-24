<?php

use App\Models\User;

class Helper
{
    public function getByID($id)
    {
        $user = User::find($id);

        return $user;
    }
}
