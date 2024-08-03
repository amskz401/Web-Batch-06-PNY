<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PublicController extends Controller
{
    function users_list() {
        
        return view('users-list');
    }

    function add_user() {
        return view("add-user");
    }

    function create_dummy_records() {
        User::factory()->count(20)->create();
        echo "Users created";
    }

    function generate_token(Request $request) {
       
        $user = User::where("email", $request->email)->first();
        $token = $user->createToken("special-products-access");
        $return_token = ["user" => $user, "token" => $token->plainTextToken];
        return response()->json($return_token);
    }
}