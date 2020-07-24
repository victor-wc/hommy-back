<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\User;


class RepublicController extends Controller

//Cria República

{
    public function createRepublic(Request $request){
        $republic = new Republic;
        $republic->street = $request->street;
        $republic->street_number = $request->street_number;
        $republic->city = $request->city;
        $republic->state = $request->state;
        $republic->cep = $request->cep;
        $republic->rating = $request->rating;
        $republic->description = $request->description;
        $republic->save();
        return response()->json($republic);
    }

    //Mostra República específica

    public function showRepublic($id){
        $republic = Republic::findorFail($id);
        return response()->json($republic);
    }

    //Mostra lista de todas as Repúblicas

    public function listRepublic(){
        $republic = Republic::all();
        return response()->json([$republic]);

    }

    //Atualiza informação da República

    public function updateRepublic(Request $request, $id){
        $republic = Republic::findorFail($id);

        if($request->street){
            $republic->street = $request->street;
        }

        if($request->street_number){
            $republic->street_number = $request->street_number;
        }

        if($request->city){
            $republic->city = $request->city;
        }

        if($request->state){
            $republic->state = $request->state;
        }

        if($request->cep){
            $republic->cep = $request->cep;
        }

        if($request->rating){
            $republic->rating = $request->rating;
        }

        if($request->description){
            $republic->description = $request->description;
        }

        $republic->save();
        return response()->json($republic);
    }

    //Deleta determinada República

    public function deleteRepublic($id){
     Republic::destroy($id);
        return response()->json(["Anúncio deletado"]);
    }

    //Conecta um usuário a essa república

    public function addRepublic($id, $republic_id){
        $user = User::findorFail($id);
        $republic = Republic::findorFail($republic_id);
        $republic->user_id = $id;
        $republic->save();
        return response()->json($republic);

    }

    //Remove essa conexão

    public function removeRepublic($id, $republic_id){
        $user = User::findorFail($id);
        $republic = Republic::findorFail($republic_id);
        $republic->user_id = NULL;
        $republic->save();
        return response()->json($republic);
    }

}
