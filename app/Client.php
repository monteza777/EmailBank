<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = ['client_name','client_email'];

    public function compid(){

        return $this->belongsTo(Compid::class);
    }

    public function cemails(){
    	return $this->hasMany(Cemail::class);
    }
}
