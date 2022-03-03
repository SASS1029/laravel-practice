<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class Usercontroller extends Controller
{
    public function showUserPhone($user_id) {
        $phone = User::findOrFail($user_id)->phone; 
        return $phone;
        //return $phone->phone;//番号の看取ってくる
    }
}
