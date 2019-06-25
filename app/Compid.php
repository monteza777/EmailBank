<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compid extends Model
{
	protected $fillable = ['compid_name'];
    
    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function cemails(){
    	return $this->belongsToMany(Cemail::class,'cemail_compid','compid_id','cemail_id');
    }
}
