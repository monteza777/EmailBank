<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = ['client_name','client_email'];

    public function compids(){

        return $this->hasMany(Compid::class);
    }

    
}
