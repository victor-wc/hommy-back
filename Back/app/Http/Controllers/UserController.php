<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    //Cria Usuário

    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->confirm_password = $request->confirm_password;

        //Valida se as senhas são iguais

        if($request->password != $request->confirm_password){
            return response()->json(["Senhas divergentes"]);;
        }

        $user->telephone_number = $request->telephone_number;
        $user->save();
        return response()->json($user);
    }

    //Mostra Usuário específico

    public function showUser($id){
        $user = User::findorFail($id);
        return response()->json($user);
    }

    //Mostra todos os Usuários

    public function listUser(){
        $user = User::all();
        return response()->json([$user]);
    }

    //Atualiza informações do Usuário

    public function updateUser(Request $request, $id){
        $user = User::findorFail($id);
        if($request->name){
            $user->name = $request->name;
        }

        if($request->password){
            $user->password = $request->password;
        }

        if($request->confirm_password){
            $user->confirm_password = $request->confirm_password;
        }

        //Valida se as senhas são iguais, as duas precisam ser trocadas ao mesmo tempo

        if($request->password != $request->confirm_password){
            return response()->json(["Senhas divergentes"]);
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

    //Delete Usuário específico

    public function deleteUser($id){
        User::destroy($id);
           return response()->json(["Usuário deletado"]);
       }



}
