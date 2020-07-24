<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Republic extends Model
{

    //RELAÇÃO (1,1)

    public function user(){
        return $this->belongsTo('App\User');
    }
}
