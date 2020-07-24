<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->telephone_number = $request->telephone_number;
        $user->save();
        return response()->json($user);
    }

    public function showUser($id){
        $user = User::findorFail($id);
        return response()->json($user);
    }

    public function listUser(){
        $user = User::all();
        return response()->json([$user]);
    }

    public function updateUser(Request $request, $id){
        $user = User::findorFail($id);
        if($request->name){
            $user->name = $request->name;
        }

        if($request->password){
            $user->password = $request->password;
        }

        if($request->telephone_number){
            $user->telephone_number = $request->telephone_number;
        }

        if($request->email){
            $user->email = $request->email;
        }

        $user->save();
        return response()->json($user);
    }

    public function User($id){
        User::destroy($id);
           return response()->json(["Produto deletado"]);
       }



}
